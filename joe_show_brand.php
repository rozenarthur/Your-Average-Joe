<?php

session_start();

if(isset($_SESSION['valid_user'])) {//checks if user is logged in
    
    require_once('joe_average_fns.php');
    
    
    $brandid = $_GET['Brand_id']; //gets the brandid from url in previouse pahe 
    $name = get_brand_name($catid);

    require_once('joe_menus.php');
    
    ?>
    <section class="Prod">
    <h2> <?php echo $name; ?></h2>
<?php
    
    $prod_array = get_prods_brand($brandid);
    
    display_prods($prod_array);
    
    require_once('joe_footer.php');
} else {//if user is not logged in redirect to login page
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
} 

?>