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
	/*A form that takes in an ID number, and redirects to the "joe_update_employee_form.php" 
	to edit an employee's information based on ID number*/
	?>
	
<section class= "change_info">
<h4>Employee ID Number</h4>
  	<p>	
  		 <form action="joe_update_employee_form.php" method="post" enctype="multipart/form-data">

  		<input type= "text" name= "id_number" pattern="[0-9]{1,16}" placeholder = "New ID Number"; />
  	        <button type="submit">Create</button> 


  		</form>
  	</p>
 </section>	
	
<?php 

    require_once('joe_footer.php'); 
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}  
?>