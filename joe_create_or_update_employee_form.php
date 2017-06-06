<?php
session_start();
if(isset($_SESSION['valid_user'])) {
    require_once('joe_menus.php');
    require_once('joe_db_fns.php');
    //Makes sure only owner can access this page
    if(!isset($_SESSION['owner_user'])) {

        throw new Exception('You do not have Access to this page');
    }
	//Form that allows the owner to create a new employee or update a current employee's information
    echo '
    <section class= "change_info">

    <p>Create a new employee account: <a href = "joe_create_employee_id.php"><br>
                    <button>Create</button></a></p>


    <p>Update a current one:<br> <a href = "joe_update_employee.php">
                <button>Update</button> 
                </a>
     <p/> 			
     </section>';

	
    require_once('joe_footer.php');
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>