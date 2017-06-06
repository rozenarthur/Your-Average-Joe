<?php
    
session_start();

if(isset($_SESSION['valid_user'])) {
    
    /*
        Script that displays cart and its contents (if any) to customer
    */
    
    require_once('joe_average_fns.php');
    
    @$new = $_GET['new'];
    
    if($new) {
        //a new item is selected
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['items'] = 0;
            $_SESSION['total_price'] = '0.00';
        }
        //if item being added is already in cart, icrements that items quantity 
        if(isset($_SESSION['cart'][$new])) {
            $_SESSION['cart'][$new]++;
        } else {
            //new item is added to cart with quantity 1
            $_SESSION['cart'][$new] = 1;
        }
        //calculates total price and total number of items in cart
        $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
        $_SESSION['items'] = calculate_items($_SESSION['cart']);
    }
    
    //allows changes to quantity for the cart
    if(isset($_POST['save'])) {
        foreach($_SESSION['cart'] as $prod_id => $qty) {
            //if quantity is set to 0, removes it from cart
            if($_POST[$prod_id] == '0') {
                unset($_SESSION['cart'][$prod_id]);
            } else {
                $_SESSION['cart'][$prod_id] = $_POST[$prod_id];
            }
        }
        
        $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
        $_SESSION['items'] = calculate_items($_SESSION['cart']);
    }
    
    require_once('joe_menus.php');
    //displays cart if there are items in it
    if(($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
        display_cart($_SESSION['cart'], true, 0);
    } else {
        echo "<p>There are no items in your cart</p><hr/>";
    }
    
    $target = "joe_front_page.php";
    
    //After adding an item to the cart, continue shopping
    
    echo '<br>';
    echo '<form method="post" action="joe_all_category.php" class = "change_info">
                        <button type="submit" >Continue Shopping</button>
                    </form>';
    echo '<br>';
    echo '<form method="post" action="joe_checkout.php" class = "change_info">
                        <button type="submit" >Checkout</button>
                    </form>';
                    
    require_once('joe_footer.php');
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
} 

?>