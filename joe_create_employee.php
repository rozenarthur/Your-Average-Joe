<?php
    session_start();
if(isset($_SESSION['valid_user'])) {
    
    
	require_once('joe_menus.php');
	require_once('joe_db_fns.php');
	
    //Makes sure only owner can access this page
    if(!isset($_SESSION['owner_user'])) {

        throw new Exception('You do not have Access to this page');
    }


	$username = $_SESSION['valid_user'];
	
	
	$conn = db_connect();

        //Takes the new ID number and inserts it into the databases' employee table and employee address table		
	$_SESSION['id_number'] = $_POST['id_number'];
	$check_id = $conn->query("SELECT * FROM Employee WHERE emp_id = '".$_SESSION['id_number']."'");
	if ($check_id->num_rows == 0) {
	    	$employee = $check_id->fetch_object();
	    	$empid = $employee->emp_id;
	    	$result = $conn->query("INSERT INTO Employee (`emp_id`) VALUES ('".$_SESSION['id_number']."') ");

		$result2 = $conn->query("INSERT INTO employee_address (`e_id`) VALUES ('".$_SESSION['id_number']."') ");
	
	}
 
    	//Checks if the employee already exists
	else {
		echo "User already exists"; 
		echo "  <section class= 'change_info'><br>
			<a href = 'joe_create_or_update_employee_form.php'> <button>Go back</button></a> 
			</section>";
		exit;
	}
	
	

	
    echo '<h2>Create employee account</h2>
      <h3>Employee ID: 
  		'.$_POST['id_number'].'
  		 </h3>';
    //HTML form that has text fields to create the new employee
    require_once('joe_employee_form.php');

    require_once('joe_footer.php');
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>
