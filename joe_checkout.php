<?php
session_start();
if(isset($_SESSION['valid_user'])) {
    
    
    require_once('joe_average_fns.php');
    
    require_once('joe_menus.php');
    
    /*
        Check to see that cart exists and that it has contents in it.
        If so, displays the cart and checkout form.
        Else, informs the user there are no items in their cart.
    */
    if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
        display_cart($_SESSION['cart'], false, 0);
        display_checkout_form();
    } else {
        echo "<p>There are no items in your cart</p>";
    }
    
    echo '<form method="post" action="joe_show_cart.php" class = "change_info">
                        <button type="submit" >Continue Shopping</button>
                    </form>';
                    
    require_once('joe_footer.php');
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>