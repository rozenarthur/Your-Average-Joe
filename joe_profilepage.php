<?php
	session_start();

if(isset($_SESSION['valid_user'])) {
	
	require_once('joe_menus.php');
	require_once('joe_db_fns.php');
	require_once('joe_output_fns.php');
	require_once('joe_user_auth_fns.php');
	$username = $_SESSION['valid_user'];
	$username_upper = strtoupper($username);
	$conn = db_connect();
	$result = $conn->query("SELECT *  FROM Employee");
	
	
	
?>
    <section>
        <h3> LOGGED IN AS: <?php 
            	output_username($username_upper);
            

            	
            ?> </h3> <br><hr> 
            <nav id="sidemenu">
            	<ul>
	        <li> <a href="joe_change_info_form.php">Manage Personal Information</a> </li>
	        
	        <?php
	        if(!isset($_SESSION['owner_user']) && !isset($_SESSION['DB_user']) && !isset($_SESSION['employee_user'])) {   
	        echo "<li> <a href='joe_order_history.php'>View Online Order History</a></li>";}
	        ?>
	        <?php
	        if(isset($_SESSION['owner_user']) || isset($_SESSION['DB_user']) || isset($_SESSION['employee_user'])) {
	        echo "<li> <a href= 'joe_update_orders.php'>Update Order Statuses</a> </li>"; }
	        ?>
	        
	        <?php 
	        if(isset($_SESSION['owner_user'])) {
	        echo "<li> <a href= 'joe_create_or_update_employee_form.php'>Create/Update Employee information</a> </li>"; }
	        ?>
	  	
	  	<?php
                //check to see that user is owner
	           if(isset($_SESSION['owner_user'])) {
	                echo "<li> <a href= 'joe_view_employees.php'>View Employees</a> </li>"; }
            ?>
	        
	        <li> <a href="joe_change_password_form.php">Change Password</a></li>    
	        
	        <li><a href="joe_logout.php">Log Out</p>
	        </li>
            </nav>
    </section>

<?php
    require_once('joe_footer.php');
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>