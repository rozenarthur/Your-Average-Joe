<?php
session_start();

if(isset($_SESSION['valid_user'])) {
    
    /*
        Script that displays information of product in a nice little profile.
    */
    
    require_once('joe_average_fns.php');
    
    
    $prod_id = $_GET['prod_id'];
    $all_prod = $_GET['all'];
   
    $product = get_prods($prod_id);
    
    require_once('joe_menus.php');
    
    
    	display_product_details($product);
    
    require_once('joe_footer.php');
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
    
?>