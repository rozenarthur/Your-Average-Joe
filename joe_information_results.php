<?php
session_start();
if(isset($_SESSION['valid_user'])) {
	
	require_once('joe_average_fns.php');
	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$email = $_POST['email'];
	$s_street = $_POST['s_street'];
    $s_city = $_POST['s_city'];
    $s_state = $_POST['s_state'];
    $s_zip_code = $_POST['s_zip_code'];
	$b_street = $_POST['b_street'];
    $b_city = $_POST['b_city'];
    $b_state = $_POST['b_state'];
    $b_zip_code = $_POST['b_zip_code'];
    
    $b_address_id = $_GET['b_address_id'];
    $s_address_id = $_GET['s_address_id'];
    
    

	
	$username = $_SESSION['valid_user'];
	
	
	$conn = db_connect();
	
//Queries that change the owner's first and last name	
if(isset($_SESSION['owner_user']))
{
	if($firstname){
		$result = $conn->query("UPDATE Owner SET = '".$firstname."' WHERE o_username='".$username."'");
	}
	
	
	if($lastname){
		$result = $conn->query("UPDATE Owner SET lastName = '".$lastname."' WHERE o_username='".$username."'");
	}
}

//Queries that change the employee's first and last name, and email	

if(isset($_SESSION['employee_user']))
{
	if($firstname){
		$result = $conn->query("UPDATE Employee SET fName = '".$firstname."' WHERE username='".$username."'");
	}
	
	
	if($lastname){
		$result = $conn->query("UPDATE Employee SET lName = '".$lastname."' WHERE username='".$username."'");
	}
	if($email){
		
	try {	
		if (!valid_email($email)) {
	            throw new Exception('That is not a valid email address.
	                                Please go back and try again.');
	        } else {
	        	$result = $conn->query("UPDATE Employee SET email = '".$email."' WHERE username='".$username."'");
	        }
        }
	
	catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }
		
	} 
}

//Queries that change the database admin's first and last name	

if(isset($_SESSION['DB_user']))
{
	if($firstname){
		$result = $conn->query("UPDATE DB_Admin SET fName = '".$firstname."' WHERE username='".$username."'");
	}
	
	
	if($lastname){
		$result = $conn->query("UPDATE DB_Admin SET lName = '".$lastname."' WHERE username='".$username."'");
	}
}


//Quereis that change the customer's information (names, addresses, ssn, email)	
else{
	if($firstname){
		$result = $conn->query("UPDATE Customer SET First_Name = '".(stripslashes($firstname))."' WHERE c_username='".$username."'");
	}
	
	
	if($lastname){
		$result = $conn->query("UPDATE Customer SET Last_Name = '".$lastname."' WHERE c_username='".$username."'");
	}
	if($email){
		try {	
		if (!valid_email($email)) {
	            throw new Exception('That is not a valid email address.
	                                Please go back and try again.');
	        } else {
	        	$result = $conn->query("UPDATE Customer SET email = '".$email."' WHERE c_username='".$username."'");
	        }
        }
	
	catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }
	}
	if($s_street){
		$result = $conn->query("UPDATE s_address SET s_street = '".$s_street."' WHERE s_address_id = '".$s_address_id."'");
	}
    if($s_city){
		$result = $conn->query("UPDATE s_address SET s_city = '".$s_city."' WHERE s_address_id = '".$s_address_id."'");
	}
    if($s_state){
		$result = $conn->query("UPDATE s_address SET s_state = '".$s_state."' WHERE s_address_id = '".$s_address_id."'");
	}
    if($s_zip_code){
		$result = $conn->query("UPDATE s_address SET s_zip_code = '".$s_zip_code."' WHERE s_address_id = '".$s_address_id."'");
	}
	if($b_street){
		$result = $conn->query("UPDATE b_address SET b_street = '".$b_street."' WHERE b_address_id = '".$b_address_id."'");
	}
    if($b_city){
		$result = $conn->query("UPDATE b_address SET b_city = '".$b_city."' WHERE b_address_id = '".$b_address_id."'");
	}
	if($b_state){
		$result = $conn->query("UPDATE b_address SET b_state = '".$b_state."' WHERE b_address_id = '".$b_address_id."'");
	}
    if($b_zip_code){
		$result = $conn->query("UPDATE b_address SET b_zip_code = '".$b_zip_code."' WHERE b_address_id = '".$b_address_id."'");
	}
	if(!$result){
		throw new Exception('Could not update info!');
	}
}	
    	require_once('joe_menus.php');
?>
<div id='login'>
<!--Let the user knows the information was updated, and redirects them back to "joe_change_info_form.php" page if need-->

            <h2>Information was updated!</h2>
	        <form method="post" action="joe_change_info_form.php">
                        <button type='submit'>Back</button>
                    </form>
                </div>
                </section>
                </article>
                </body>
        </html> 
<?php
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>