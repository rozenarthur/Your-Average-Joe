<?php
    
    /*
        Container for functions used to obtain information related to products
    */
    
    //function that gets product categories name and id and returns an array
    function get_categories() {

        $conn = db_connect();
        $query = "SELECT category_id, c_name FROM Category";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }

        $num_cats = @$result->num_rows;
        if($num_cats == 0) {
            return false;
        }

        $result = db_result_to_array($result);
        return $result;
    }
    
    //function that gets product brand name and id and returns an array
    function get_brands() {

        $conn = db_connect();
        $query = "SELECT Brand_id, Brand_name FROM Brand";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }

        $num_cats = @$result->num_rows;
        if($num_cats == 0) {
            return false;
        }

        $result = db_result_to_array($result);
        return $result;
    }

    //function that gets a category's name
    function get_category_name($catid) {
        $conn = db_connect();
        $query = "SELECT c_name FROM Category
                    WHERE category_id = '".$catid."'";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }
        $num_cats = @$result->num_rows;
        if ($num_cats == 0) {
            return false;
        }
        $row = $result->fetch_object();
        return $row->c_name;
    }

    //function that gets a brand's name
    function get_brand_name($brandid) {
        $conn = db_connect();
        $query = "SELECT Brand_name FROM Brand
                    WHERE Brand_id = '".$brandid."'";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }
        $num_cats = @$result->num_rows;
        if ($num_cats == 0) {
            return false;
        }
        $row = $result->fetch_object();
        return $row->Brand_name;
    }
    
    //function that gets all products of a certain category
     function get_prods_cat($catid) {
        $conn = db_connect();
        $query = "SELECT * FROM Product WHERE Category_id='".$catid."'";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }

        $num_cats = @$result->num_rows;
        if($num_cats == 0) {
            return false;
        }

        $result = db_result_to_array($result);
        return $result;
    }
    
    //function that gets all prdoducts of a certain brand
    function get_prods_brand($brandid) {
        $conn = db_connect();
        $query = "SELECT * FROM Product WHERE Brand_id='".$brandid."'";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }

        $num_cats = @$result->num_rows;
        if($num_cats == 0) {
            return false;
        }

        $result = db_result_to_array($result);
        return $result;
    }

    //gets product details and returns an indexed array
    function get_prods($prod_id) {
       $conn = db_connect();
       $query = "SELECT * FROM Product WHERE prod_id='".$prod_id."'";
       $result = @$conn->query($query);
       if(!$result) {
           return false;
       }

       $num_cats = @$result->num_rows;
       if($num_cats == 0) {
          return false;
       }

       $result = db_result_to_array($result);
       return $result;
    }
    
    //gets product details and returns and associative array
    function get_product_details($prod_id) {
    	 if ((!$prod_id) || ($prod_id=='')) {
     		return false;
  		}
  	$conn = db_connect();
 	 $query = "SELECT * FROM Product WHERE prod_id='".$prod_id."'";
  	$result = @$conn->query($query);
  	if (!$result) {
    	 return false;
  	}
  	$result = @$result->fetch_assoc();
  	return $result;
    }
    
    //function to get product information and quantity included in a certain order
    function get_order_details($ord_id) {
    	 
  	$conn = db_connect();
 	 $query = "SELECT * FROM Ordered_items WHERE ord_id='".$ord_id."'";
  	$result = @$conn->query($query);
  	if (!$result) {
    	 return false;
  	}
  	
  	$num_ord = @$result->num_rows;
        if($num_ord == 0) {
            return false;
        }
  	$result = db_result_to_array($result);
  	return $result;
    }
    
    //gets information of a particular order
    function get_orders($c_id) {

        $conn = db_connect();
        $query = "SELECT * FROM Orders WHERE c_id = '".$c_id."'";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }

        $num_ord = @$result->num_rows;
        if($num_ord == 0) {
            return false;
        }

        $result = db_result_to_array($result);
        return $result;
    }
//gets all products in the database
function get_prods_all($all) {
        $conn = db_connect();
        $query = "SELECT * FROM Product";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }

        $num_cats = @$result->num_rows;
        if($num_cats == 0) {
            return false;
        }

        $result = db_result_to_array($result);
        return $result;
    }

//gets all categories in the database
function get_cate_all($cate){

$conn = db_connect();
        $query = "SELECT * FROM Category WHERE category_id ='".$cate."'";
        $result = @$conn->query($query);
        if(!$result) {
            return false;
        }

        $num_cats = @$result->num_rows;
        if($num_cats == 0) {
            return false;
        }

        $result = db_result_to_array($result);
        return $result;
    }
    
    //function to calculate total price sum for all items in shopping cart
    function calculate_price($cart) {
        $price = 0.0;
        if(is_array($cart)) {
            $conn = db_connect();
            foreach($cart as $prod_id => $qty) {
                $query = "SELECT price FROM Product WHERE prod_id='".$prod_id."'";
                $result = $conn->query($query);
                if($result) {
                    $item = $result->fetch_object();
                    $item_price = $item->price;
                    $price += $item_price*$qty;
                }
            }
        }
        
        return $price;
    }

    //function that calculates total items in shopping cart
    function calculate_items($cart) {
        $items = 0;
        if(is_array($cart)) {
            foreach($cart as $prod_id => $qty) {
                $items += $qty;
            }
        }
        
        return $items;
    }

    /*
        function that inserts order information into database (as well as billing and shipping address information if new addresses were used). Also updates the stock of items in database based on order.
    */
    function insert_order($order_details) {
        //extract order details out as variables
        extract($order_details);
        
        //set shipping address same as address if not already set
        if((!$ship_fname) && (!$ship_lname) && (!$ship_street) && (!$ship_city)
            && (!$ship_state) && (!$ship_zip)) {
            $ship_fname = $fname;
            $ship_lname = $lname;
            $ship_street = $street;
            $ship_city = $city;
            $ship_state = $state;
            $ship_zip = $zip;
        }
        
        $conn = db_connect();
        
        //Turns off autocommit to allow the order to be made as a transaction
        $conn->autocommit(FALSE);
        
        //get c_id from billing address if billing address used matches billing address in database.
        $query = "SELECT c_id FROM b_address WHERE b_fname = '".$fname."' AND b_lname = '".$lname."' AND b_street = '".$street."' AND b_city = '".$city."' AND b_state = '".$state."' AND b_zip_code = '".$zip."'";
        
        $result = $conn->query($query);
        
        if($result->num_rows>0) {
            $customer = $result->fetch_object();
            $customerid = $customer->c_id;
        } else {
            //if billing address used for order does not exist in database, inserts it
            $query = "SELECT c_id FROM Customer WHERE c_username = '".$_SESSION['valid_user']."'";
            $result = $conn->query($query);
            $customer = $result->fetch_object();
            $customerid = $customer->c_id;
            $query = "INSERT INTO b_address (b_street, b_city, b_state, b_zip_code, c_id, b_fname, b_lname) VALUES ('".$street."', '".$city."', '".$state."', '".$zip."', '".$customerid."', '".$fname."', '".$lname."')";
            $result = $conn->query($query);
            
            if(!$result) {
            	echo $customerid;
                return false;
            }
               
        }
        //query to get billing adddress used in order and sets respective session variable 
        $query = "SELECT b_address_id FROM b_address WHERE b_street = '".$street."' AND b_city = '".$city."' AND b_state = '".$state."' AND b_zip_code = '".$zip."' AND c_id = '".$customerid."' AND b_fname = '".$fname."' AND b_lname = '".$lname."'";
            
            $result = $conn->query($query);
            $b_address = $result->fetch_object();
            $bid = $b_address->b_address_id;
            $_SESSION['b_address']= $bid;
            
        //same as above, but for shipping address
        $query = "SELECT c_id FROM s_address WHERE s_fname = '".$ship_fname."' AND s_lname = '".$ship_lname."' AND s_street = '".$ship_street."' AND s_city = '".$ship_city."' AND s_state = '".$ship_state."' AND s_zip_code = '".$ship_zip."'";
        
        $result = $conn->query($query);
        
        if($result->num_rows>0) {
            $customer = $result->fetch_object();
            $customerid = $customer->c_id;
        } else { 
            $query = "SELECT c_id FROM Customer WHERE c_username = '".$_SESSION['valid_user']."'";
            $result = $conn->query($query);
            $customer = $result->fetch_object();
            $customerid = $customer->c_id;
            $query = "INSERT INTO s_address (s_street, s_city, s_state, s_zip_code, c_id, s_fname, s_lname) VALUES ('".$ship_street."', '".$ship_city."', '".$ship_state."', '".$ship_zip."', '".$customerid."', '".$ship_fname."', '".$ship_lname."')";
            $result = $conn->query($query);
            
            if(!$result) {
            	echo $customerid;
                return false;
            }
        }
        
        $query = "SELECT s_address_id FROM s_address WHERE s_street = '".$ship_street."' AND s_city = '".$ship_city."' AND s_state = '".$ship_state."' AND s_zip_code = '".$ship_zip."' AND c_id = '".$customerid."' AND s_fname = '".$ship_fname."' AND s_lname = '".$ship_lname."'";
            
            $result = $conn->query($query);
            $s_address = $result->fetch_object();
            $sid = $s_address->s_address_id;
            $_SESSION['s_address'] = $sid;
            
        
        //gets date
        $date = date("Y-m-d");
        $status = "PARTIAL";
        
        //inserts order into database
        $query = "INSERT INTO Orders(c_id, amount, date, order_status, ship_fname, ship_lname, ship_street, ship_city, ship_state, ship_zip) VALUES ('".$customerid."', '".$_SESSION['total_price']."', '".$date."','".$status."', '".$ship_fname."', '".$ship_lname."', '".$ship_street."', '".$ship_city."', '".$ship_state."', '".$ship_zip."')";
        
        $result = $conn->query($query);
        if (!$result) {
            return false;
        }
        //gets order id
        $query = "SELECT ord_id FROM Orders WHERE c_id = '".$customerid."' AND amount = '".$_SESSION['total_price']."' AND date = '".$date."' AND order_status = '".$status."' AND ship_fname = '".$ship_fname."' AND ship_lname = '".$ship_lname."' AND ship_street = '".$ship_street."' AND ship_city = '".$ship_city."' AND ship_state = '".$ship_state."' AND ship_zip = '".$ship_zip."'";
        
        $result = $conn->query($query);
        
        if($result->num_rows>0) {
            $order = $result->fetch_object();
            $orderid = $order->ord_id;
            $_SESSION['ord_id'] = $orderid;
        } else {
            return false;
        }
        
        
        
        //insert each product of order into database
        foreach ($_SESSION['cart'] as $prod_id => $quantity) {
            $detail = get_product_details($prod_id);
            $query = "DELETE FROM Ordered_items WHERE ord_id = '".$orderid."' AND prod_id = '".$prod_id."'";
            $result = $conn->query($query);
            $query = "INSERT INTO Ordered_items VALUES ('".$orderid."', '".$prod_id."', ".$detail['price'].", '".$quantity."')";
            $result = $conn->query($query);
            if(!$result) {
                return false;
            }
            $query = "UPDATE Product SET Items_In_stock = '".($detail['Items_In_stock']-$quantity)."' WHERE prod_id = '".$prod_id."'";
            $result = $conn->query($query);
            if(!$result) {
            	return false;
            }
        }
        
        //ends transaction
        $conn->commit();
        $conn->autocommit(TRUE);
        
        return $orderid;
    }

    //function that returns shipping cost. For this site's purposes, all shipping costs for orders is five dollars.
    function calculate_shipping_cost() {
        return 5;
    }



?>