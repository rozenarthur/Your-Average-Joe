<?php

session_start();


if(isset($_SESSION['valid_user'])) {
	

	require_once('joe_menus.php');
	require_once('joe_db_fns.php');
    //Makes sure only owner can access this page
    if(!isset($_SESSION['owner_user'])) {

        throw new Exception('You do not have Access to this page');
    }
	
	
	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$email = $_POST['email'];
	
	$jobtitle = $_POST['job_title'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$ssn = $_POST['ssn'];
	
	$e_street = $_POST['e_street'];
	$e_city = $_POST['e_city'];
	$e_state = $_POST['e_state'];
	$ezipcode = $_POST['e_zip_code'];
		
	$conn = db_connect();


	
	//IF statements that updates the employee tables based of the "joe_create_employee.php" page
	//Update's an employees job title, first and last name, email, password, ssn, and address
	if($jobtitle){
		$result = $conn->query("UPDATE Employee SET title = '".$jobtitle."' WHERE emp_id ='".$_SESSION['id_number']."'");
	}
	if($firstname){
		$result = $conn->query("UPDATE Employee SET fName = '".$firstname."' WHERE emp_id ='".$_SESSION['id_number']."'");
	}
	
	if($lastname){
		$result = $conn->query("UPDATE Employee SET lName = '".$lastname."' WHERE emp_id ='".$_SESSION['id_number']."'");
	}
	if($username){
		$result = $conn->query("UPDATE Employee SET username = '".$username."' WHERE emp_id ='".$_SESSION['id_number']."'");
	}
	if($password){
		$result = $conn->query("UPDATE Employee SET password = sha1('".$password."') WHERE emp_id ='".$_SESSION['id_number']."'");
	}
	if($email){
		$result = $conn->query("UPDATE Employee SET email = '".$email."' WHERE emp_id ='".$_SESSION['id_number']."'");
	}
	if($ssn){
		$result = $conn->query("UPDATE Employee SET e_ssn = '".$ssn."' WHERE emp_id ='".$_SESSION['id_number']."'");
	}
	
	
    if($e_street){
	$result = $conn->query("UPDATE employee_address SET e_street = '".$e_street."' WHERE e_id ='".$_SESSION['id_number']."'");
	}
    if($e_city){
	$result = $conn->query("UPDATE employee_address SET e_city = '".$e_city."' WHERE e_id ='".$_SESSION['id_number']."'");
	}
    if($e_state){
	$result = $conn->query("UPDATE employee_address SET e_state = '".$e_state."' WHERE e_id ='".$_SESSION['id_number']."'");
	}
    if($ezipcode){
	$result = $conn->query("UPDATE employee_address SET e_zipcode = '".$ezipcode."' WHERE e_id ='".$_SESSION['id_number']."'");
	}
	if(!$result){
		throw new Exception('Could not INSERT info!');
	}
	
	
    
?>
<!--Verifies that the information was updated, and has a button to redirect to the "joe_create_or_update_employee.php" form-->

<div id='login'>
            <h2>Information was updated!</h2>
	        <form method="post" action="joe_create_or_update_employee_form.php">
                        <button type='submit'>Back</button>
                    </form>
                </div>
                </section>
                </article>
                </body>
 <?php
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>

