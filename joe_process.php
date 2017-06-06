<?php
   
session_start();
 
if(isset($_SESSION['valid_user'])) {
    
    /*
        Script that takes prints out receipt for order, inserts card information into database, clears cart of products, and sends order confirmation to customer's email.
    */
    
    require_once('joe_average_fns.php');
    
    require_once('joe_menus.php');
    
    echo "<h4>Checkout</h4><br>
    		<h4>Order #".$_SESSION['ord_id']."</h4>"; //Order #
    
    //Gets card information from user input
    $card_type = $_POST['card_type'];
    $card_letters = $_POST['card_letters'];
    $card_month = $_POST['card_month'];
    $card_year = $_POST['card_year'];
    $card_name = $_POST['card_name'];
    
    
    $conn = db_connect();

    $query = "SELECT c_id FROM Customer WHERE c_username = '".$_SESSION['valid_user']."'";

    $result = $conn->query($query);
    $customer = $result->fetch_object();
    $customerid = $customer->c_id;

    //check to see if card used is already in database
    $query = "SELECT * FROM Card WHERE card_letters = sha1('".$card_letters."') AND card_name = '".$card_name."' AND card_type ='".$card_type."' AND card_month = '".$card_month."' AND card_year = '".$card_year."' AND c_id = '".$customerid."'";

    $result = $conn->query($query);
    
    //if card isnt in database, inserts it in database
    if($result->num_rows==0) {
            
        $query = "INSERT INTO Card (card_letters, card_name, card_type, card_month, card_year, c_id) VALUES (sha1('".$card_letters."'), '".$card_name."', '".$card_type."', '".$card_month."', '".$card_year."', '".$customerid."')";
        
        $result = $conn->query($query);
        
        if (!$result) {
            echo "Could not process your card.";
            exit;
        } 
        
    }
       
    if(($_SESSION['cart']) && ($card_type) && ($card_letters) &&
        ($card_month) && ($card_year) && (card_name)) {
        //display cart, not allowing changes and without purchases
        display_cart($_SESSION['cart'], false, 0);
        //displays shipping cost and total including shipping
        display_shipping(calculate_shipping_cost());
        //displays billing and shipping addresses used for order
        display_addresses_checkout($_SESSION['b_address'], $_SESSION['s_address']);
         
        //displays payment details
         echo '<h4>Payment details:</h4>
        	<p>'.$card_type.' ending in '.substr($card_letters, 11, -1).'<br>
        	Expires '.$card_month.'/'.$card_year.'</p><br><hr><br>';
        	
        $msg = "This is an email confirming your Order #".$_SESSION['ord_id'].".";
        $msg .= "Thank You for shopping with Your Average Joe!";
        
        //gets customer email
        $query = "SELECT email FROM Customer WHERE c_username = '".$_SESSION['valid_user']."'";
        
        $result = $conn->query($query);
        $row = $result->fetch_object();
        $email = $row->email;
        $from = "From: Orders@YourAverageJoe \r\n";
        
        //sends confirmation email to customer
        mail($email, 'Order Confirmation', $msg, $from);
         
        //empty shopping cart and set items and total price back to 0
        $_SESSION['cart'] = array();
        $_SESSION['items'] = 0;
        $_SESSION['total_price'] = 0;
        unset($_SESSION['b_address']);
        unset($_SESSION['s_address']);
        unset($_SESSION['ord_id']);
        
        echo "<p>Thank you for shopping with Your Average Joe! Your order has been placed.</p>";
        
        echo '<form method="post" action="joe_front_page.php" class = "change_info">
                        <button type="submit" >Back to Home</button>
                    </form>';
        require_once('joe_footer.php');            
     }
    
    } else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>