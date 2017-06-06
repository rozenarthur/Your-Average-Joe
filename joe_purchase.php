<?php

session_start();

if(isset($_SESSION['valid_user'])) {
    
    /*
        Script that gets billing and shipping information from checkout form and then inserts order information and billing and shipping addresses (if new ones were used) into database. Then prompts customer for credit card info.
    */
    
    require_once('joe_average_fns.php');
    
    require_once('joe_menus.php');
    
    //short variable names
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    
    $ship_fname = $_POST['ship_fname'];
    $ship_lname = $_POST['ship_lname'];
    $ship_street = $_POST['ship_street'];
    $ship_city = $_POST['ship_city'];
    $ship_state = $_POST['ship_state'];
    $ship_zip = $_POST['ship_zip'];
    
    //variable names if using an existing billing or shipping address
    $b_id = $_POST['b_id'];
    $s_id = $_POST['s_id'];
    
    //if new billing info form was not filled out in previous page, then uses the existing billing address chosen
    if((!$fname) && (!$lname) && (!$street) && (!$city)
            && (!$state) && (!$zip)) {
            
            $conn = db_connect();
            
            $query = "SELECT * FROM b_address WHERE b_address_id = '".$b_id."'";
            
            $result = $conn->query($query);
            $result = db_result_to_array($result);
            
            foreach($result as $row) {
            	$_POST['fname'] = $row['b_fname'];
            	$_POST['lname'] = $row['b_lname'];
            	$_POST['street'] = $row['b_street'];
            	$_POST['city'] = $row['b_city'];
            	$_POST['state'] = $row['b_state'];
            	$_POST['zip'] = $row['b_zip_code'];
            	
            	$fname = $row['b_fname'];
                $lname = $row['b_lname'];
                $street = $row['b_street'];
                $city = $row['b_city'];
                $state = $row['b_state'];
                $zip = $row['b_zip_code'];
            }
    }
    
    //if existing shipping address was chosen, then does the same as code above, but with shipping info
    if(isset($s_id)) {
    	$conn = db_connect();
            
            $query = "SELECT * FROM s_address WHERE s_address_id = '".$s_id."'";
            
            $result = $conn->query($query);
            $result = db_result_to_array($result);
            
            foreach($result as $row) {
            	$_POST['ship_fname'] = $row['s_fname'];
            	$_POST['ship_lname'] = $row['s_lname'];
            	$_POST['ship_street'] = $row['s_street'];
            	$_POST['ship_city'] = $row['s_city'];
            	$_POST['ship_state'] = $row['s_state'];
            	$_POST['ship_zip'] = $row['s_zip_code'];
            	
            	$ship_fname = $row['s_fname'];
                $ship_lname = $row['s_lname'];
                $ship_street = $row['s_street'];
                $ship_city = $row['s_city'];
                $ship_state = $row['s_state'];
                $ship_zip = $row['s_zip_code'];
            }
    }
    
    //checks to see if everything is filled out
    
    if (($_SESSION['cart']) && ($fname) && ($lname) && ($street) && ($city) && ($state) &&
        ($zip)) {
        //checks to see if able to insert into database
        if(insert_order($_POST) != false) {
            display_cart($_SESSION['cart'], false, 0);
            
            display_shipping(calculate_shipping_cost());
            
            //prompts user for credit card details
            display_card_form();
            
            echo '<form method="post" action="joe_show_cart.php" class = "change_info">
                        <button type="submit" >Continue Shopping</button>
                    </form>';
        } else {
            echo "<p>Could not store data, please try again.</p>";
            echo '<form method="post" action="joe_checkout.php" class = "change_info">
                        <button type="submit" >Back</button>
                    </form>';
        }
    } else {
        echo "<p>You did not fill in all the required fields, please try again</p><hr />";
        echo '<form method="post" action="joe_checkout.php" class = "change_info">
                        <button type="submit" >Back</button>
                    </form>';
    }
    
    require_once('joe_footer.php');
    
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>