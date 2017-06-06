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
	$result = $conn->query("SELECT * FROM Employee c JOIN s_address s ON c.c_id=s.s_address_id WHERE username='".$username."'");
	
	if ($result->num_rows > 0) {
	    	$row = $result->fetch_assoc(); 
	        	 
	        	} else {
	        	echo "0 results";
			}
	
	//Form to take in an ID to make a new employee account
	echo '
    <section class= "change_info">
    <h4>Employee ID Number</h4>
  	<p>	
        <form action="joe_create_employee.php" method="post" enctype="multipart/form-data">

  		<input type= "text" name= "id_number" pattern="[0-9]{1,16}" placeholder = "New ID Number"/>
  	     <button type="submit">Create</button> 


  		</form>
  	</p>
    </section>';	 

    require_once('joe_footer.php'); 
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>