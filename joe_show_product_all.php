<?php
	session_start();
if(isset($_SESSION['valid_user'])) {//checks if user is logged in
    
    require_once('joe_average_fns.php');
    

    $all = $_GET['all']; //gets the all product id from previous pages url
    
    require_once('joe_menus.php');
    
?>
    <section class="Prod">
    <h2>All Products</h2>
<?php
    require_once('joe_user_auth_fns.php');
    

    $prod_array = get_prods_all($all);
    display_prods($prod_array);
    require_once('joe_footer.php');
} else {//if user is not logged in redirect to login page
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}  
    

?>