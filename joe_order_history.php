<?php

session_start();

if(isset($_SESSION['valid_user'])) {
	
    /*
        Script to display a customer's employee order history.
    */
    
	require_once('joe_average_fns.php');
	
	require_once('joe_menus.php');
	
	$conn = db_connect();
    
	//query to get customer id
	$query = "SELECT c_id FROM Customer WHERE c_username = '".$_SESSION['valid_user']."'";
	
	$result = $conn->query($query);
	
	$customer = $result->fetch_object();
	$c_id = $customer->c_id;
	
    //gets orders matching order id
	$ord_id_array = get_orders($c_id);
	
    //displays orders and their information
	display_orders($ord_id_array);
	
	require_once('joe_footer.php');
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
	
?>