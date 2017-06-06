<?php

//Function to register a new customer to database
function register($fname, $lname, $username, $password, $email) {

    $conn = db_connect();

    //check if username is unique
    $result = $conn->query("SELECT * FROM Customers
                            WHERE c_username='".$username."'");

    $result2 = $conn->query("SELECT * FROM Employee
                            WHERE username='".$username."'");

    $result3 = $conn->query("SELECT * FROM DB_Admin
                            WHERE username='".$username."'");
    $result4 = $conn->query("SELECT * FROM Owner
                            WHERE o_username='".$username."'");

    if (($result->num_rows>0) || ($result2->num_rows>0) || ($result3->num_rows>0) || ($result4->num_rows>0)) {
        throw new Exception('That username is taken. Please choose another one and
                            try again.');
    }

    //puts in database if everything is okay
    $result = $conn->query("INSERT INTO Customer (First_Name, Last_Name, c_username,
                            Password, email) VALUES
                            ('".$fname."', '".$lname."', '".$username."', sha1('".$password."'), '".$email."')");
    if (!$result) {
        throw new Exception('Could not register you in database - please try again later.');
    }

    return true;
}

/*
    Function used to check username and password with database
    Also creates appropriate session variable if user is an owner, database admin, or employee
*/
function login($username, $password) {
    //check username and pw with db
    // yes if true
    // else throws exception

    // connect to db
    $conn = db_connect();
	//Query to get user from Customers
	$query = "SELECT * FROM Customer
                 WHERE c_username='".$username."'
                 AND Password = sha1('".$password."')";
        $result = $conn->query($query);
        //if not a customer, check to see if its the owner
        if ($result->num_rows==0) {
	        $query = "SELECT * FROM Owner WHERE o_username='".$username."'
	        AND password = sha1('".$password."')";

	        $result = $conn->query($query);

            //if not owner, checks to see if its an employee
	        if($result->num_rows==0) {
	               $query = "SELECT * FROM Employee
	                WHERE username='".$username."'
	                AND password = sha1('".$password."')";

	          	$result = $conn->query($query);

                //if not employee checks to see if db admin
          		if($result->num_rows==0) {
          			$query = "SELECT * FROM DB_Admin
                 			WHERE username='".$username."'
                 			AND password = sha1('".$password."')";
                 		$result = $conn->query($query);

                        //if none of the above, throws an exception
                 		if($result->num_rows==0) {
                 			throw new Exception('Could not log you in.');
                 		} else {

                 			$_SESSION['DB_user'] = $username;
                 			return true;
                 		}
          		} else {

          			$_SESSION['employee_user'] = $username;
          			return true;
          		}

               } else {

               		$_SESSION['owner_user'] = $username;
               		return true;
               }

        } else {

        	return true;
        }
}

//Function that allows user to change passwords
function change_password($username, $old_password, $new_password) {
    //if old password is right, change their password to new_password and return true


    login($username, $old_password);
    $conn = db_connect();

    //checks to see what kind of user is trying to change password
    if ((!isset($_SESSION['DB_user'])) || (!isset($_SESSION['owner_user'])) || (!isset($_SESSION['employee_user']))) {
    	$result = $conn->query("UPDATE Customer
                            SET Password = sha1('".$new_password."')
                            Where c_username = '".$username."'");
    } elseif (isset($_SESSION['employee_user'])) {
    	$result = $conn->query("UPDATE Employee
                            SET password = sha1('".$new_password."')
                            Where username = '".$username."'");
    } elseif (isset($_SESSION['DB_user'])) {
    	$result = $conn->query("UPDATE DB_Admin
                            SET password = sha1('".$new_password."')
                            Where username = '".$username."'");
    } else {
    	$result = $conn->query("UPDATE Owner
                            SET password = sha1('".$new_password."')
                            Where o_username = '".$username."'");
    }
    if(!$result) {
        throw new Exception('Password could not be changed.');
    } else {
        return true; //changed successfully
    }
}

//function that allows user to reset their forgotten password
function reset_password($username) {
    //set password for username to random value
    //return the new password or false on failure
    //get a random string between 6 and 13 characters in length

    $new_password = get_random_string(rand(6, 13));

    if($new_password == false) {
        throw new Exception('Could not generate new password.');
    }

    //add a number between 0 and 999 to it, making it a better password
    $rand_number = rand(0, 999);
    $new_password .= $rand_number;

    //set user's password to this in database or return false
    $conn = db_connect();
    $result = $conn->query("UPDATE Customer
                            SET Password = sha1('".$new_password."')
                            WHERE c_username = '".$username."'");

    if (!$result) {
        throw new Exception('Could not change password.');
    } else {
        return $new_password; //changed successfully
    }
}

//function that generates a random string of letters
function get_random_string($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters_length = strlen($characters);
    $random_string = '';

    for($i=0; $i<$length; $i++) {
        $random_string .= $characters[rand(0, $characters_length - 1)];
    }
    return $random_string;
}

//Function that sends user an email saying their password has been changed
function notify_password($username, $password) {

    $conn = db_connect();
    $result = $conn->query("SELECT email FROM Customer
                            WHERE c_username='".$username."'");

    if (!$result) {
        throw new Exception('Could not find email address.');
    } else if ($result->num_rows == 0) {
        throw new Exception('Could not find email address.');
    } else {
        $row = $result->fetch_object();
        $email = $row->email;
        $from = "From: support@youraveragejoe \r\n";
        $mesg = "Your YourAverageJoe password has been changed to ".$password."\r\n"."Please change it next time you log in.\r\n";
    }

    if (mail($email, 'YourAverageJoe Password Change', $mesg, $from)) {
        return true;
    } else {
        throw new Exception('Could not send email.');
    }
}
?>
