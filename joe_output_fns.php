<?php

    /*
        Container holding site functions that displays information onto the site.
    */

    //simple function that creates a url
    function do_html_url($url, $title) {
?>
        <a href="<?=$url?>"><?=$title?></a>
<?php

    }
    
    //displays username
    function output_username($user) {
         echo $user;
    }
    
    //function to display categories
    function display_categories($cat_array) {
        //check to see if parameter passed is an array
        if (!is_array($cat_array)) {
            echo "<p>No categories</p>";
            return;
        }
        
        //displays each category as a url link
        echo "<ul>";
        foreach ($cat_array as $row) {
            $url = "joe_show_cat.php?category_id=".($row['category_id']);
            $title = $row['c_name'];
            echo "<li>";
            do_html_url($url, $title);
            echo "</li>";
        }
        echo "</ul>";
    }
    
    //simliar to display categories, but with brands
    function display_brands($brand_array) {
        if (!is_array($brand_array)) {
            echo "<p>No brands</p>";
            return;
        }
        
        echo "<ul>";
        foreach ($brand_array as $row) {
            $url = "joe_show_brand.php?Brand_id=".($row['Brand_id']);
            $title = $row['Brand_name'];
            echo "<li>";
            do_html_url($url, $title);
            echo "</li>";
        }
        echo "</ul>";
    }
    
    //similiar to display_categories() and display_brands(), but with products
    function display_prods($prods_array) {
        if (!is_array($prods_array)) {
            echo "<p>No Products to Display</p>";
            return;
        }
        
        //check to see if user is Database Admin or Owner. If so, shows url that allows them to add a prodcut.
        if(isset($_SESSION['DB_user']) || isset($_SESSION['owner_user'])) {
            $url2 = "joe_add_product.php";
            $title2 = "Add a Product";
            do_html_url($url2, $title2);
        }
        
        //displays product information. 
        foreach ($prods_array as $row) {
            $url = "joe_product_profile.php?prod_id=".($row['prod_id']);
            $title = $row['name'];
            echo "<section>";       
            echo '<div><img src = "'.$row[image].'"> </img></div>';

            echo "<section>";
            echo '<div id = "prod_nested">';
            //displays product name as a url
            do_html_url($url, $title);
            //displays product description and price
            echo "<div><p>".$row[p_desc]."</p></div></div>";
            echo "<p>$".$row[price]."</p>";      
            echo "</section></section>";
        }

    }
    
    //function to display orders 
    function display_orders($ord_array) {
    	if (!is_array($ord_array)) {
            echo "<p>No Orders to Display</p>";
            return;
       }
        //Goes through array of orders and displays each order's information
        foreach ($ord_array as $row) {
        	
        	echo "<h4>Order: #".$row['ord_id']."</h4>
        		<p>Date ordered: ".$row['date']."<br>
        		Order Status: ".$row['order_status']."<br>
        		Shipped to: <br>
        		".$row['ship_fname']." ".$row['ship_lname']." <br>
        		".$row['ship_street']." <br>
        		".$row['ship_city']." ".$row['ship_state']." ".$row['ship_zip']."</p><br>";
            //Gets the details of products included in order
        	$ordered_items_array = get_order_details($row['ord_id']);
        	echo "<table><tr><th colspan='1'>Product name</th>
        		<th>Item Price</th>
        		<th>Quantity</th>
        		<th>Total</th></tr>";
            
            //Inner loop that displays products included in order and accompanying info. displays info in a table.
        	foreach($ordered_items_array as $item) {
        		$conn = db_connect();
	        	$query = "SELECT name FROM Product WHERE prod_id = '".$item['prod_id']."'";
	        	$result = $conn->query($query);
	        	$result = db_result_to_array($result);
	        	foreach($result as $name) {
        		echo "<tr><td>".$name['name']."</td>";
        		}
        		echo "<td>$".$item['item_price']."</td>
        		<td>".$item['quantity']."</td>
        		<td>$".($item['item_price']*$item['quantity'])."</td></tr>";
        	}
        	echo "<tr><th colspan = '3'>Total</th>
        		<th>$".$row['amount']."</th></tr>";
        		
        	echo "<tr>
                <td colspan='3'>Shipping</td>
                <td>$5</td>
              </tr>
              <tr>
                <th colspan='3'>Total Including Shipping</th>
                <th>$".($row['amount'] + 5)."</th>
              </tr>
              </table>'";
        	echo "<br><hr><br>";
        }
    }
    
    //function that displays product details for product profile page
     function display_product_details($prods_array) {
        if (!is_array($prods_array)) {
            echo "<p>No Product to Display</p>";
            return;
        }
        
        foreach ($prods_array as $row) {
        
        //check to hide Update Quantity option from customers
        if(isset($_SESSION['employee_user']) || isset($_SESSION['DB_user']) || isset($_SESSION['owner_user'])) {
            $url = "joe_quantity_update.php?p_id=".($row['prod_id']);
            $title = "Update Quantity";
            do_html_url($url, $title);
	     }
        //check to hide edit product details from customers and employees
	    if(isset($_SESSION['DB_user']) || isset($_SESSION['owner_user'])) {
            $url2 = "joe_edit_product_details.php?p_id=".($row['prod_id']);
            $title2 = "Edit Product Details";
            do_html_url($url2, $title2);
 	    }
            echo "<h4>".$row[name]."</h4> <br> <hr> <br>";
            echo '<section>';
            echo '<figure><img src = "'.$row[image].'"> </img></figure><br><hr><br>';
            echo '<p>'.$row[p_desc].'</p>';
            echo "<p id = 'price'>$".$row[price]."</p>";
            echo "<p id = 'quantity'>Quantity In Stock: ".$row[Items_In_stock]."</p>"; 
            
            //Gives ability to add item to cart for customer if item is in stock. hides from all other users
            if (($row[Items_In_stock] > 0) && (!isset($_SESSION['owner_user'])) && (!isset($_SESSION['DB_user'])) && (!isset($_SESSION['employee_user']))) {
	            echo '<form method="post" action="joe_show_cart.php?new='.$row[prod_id].'" class = "change_info">
	                        <button type="submit" >Add to Cart</button>
	                    </form>';
            //Displays disabled out of stock button when item is out of stock
            } elseif (($row[Items_In_stock] == 0)) {
            	echo '<form method="post" class = "change_info">
	                        <button type="button" disabled>OUT OF STOCK</button>
	                        </form>';
            //If item is in stock and user is not a customer, then displays product's id number
            } else {
            	echo '<form method="post" class = "change_info">
	                        <button type="button" disabled>Product ID#: '.$row[prod_id].'</button>
	                        </form>';
            }
            echo '</section></div>';
            
        }
    }

    //function used to display cart
    function display_cart($cart, $change = true, $images = 1) {
        //display items in shopping cart
        //optionally allows changes to quanitity
        //optionally allows inclusion of images 
        
        echo "<table>
             <form action=\"joe_show_cart.php\" method=\"post\">
             <tr><th colspan=".(1 + $images)."\">Item</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Total</th>
             </tr>";
        
        //display each item as a table row
        foreach ($cart as $prod_id => $qty) {
        
            $product = get_product_details($prod_id);
            echo "<tr>";
            if($images == true) {
                echo "<td align=\"left\">";
                if(file_exists($product['image'])) {
                    $size = GetImageSize($product['image']);
                    if(($size[0] > 0) && ($size[1] > 0)) {
                        echo "<img src = ".$prod_id['image']."\"
                            style=\"border: 1px solid black\"
                            width=\"".($size[0]/3)."\"
                            height=\"".($size[1]/3)."\"/>"; 
                    }
                } else {
                    echo "&nbsp;";
                }
                echo "</td>";
            }
            
            echo "<td>
                    <a href=\"joe_product_profile.php?prod_id=".$prod_id."\">".$product['name']."</a></<td>
                    <td>$".number_format($product['price'], 2)."</td>
                    <td>";
            
            //allows changes to quantity
            
            if($change == true) {
                echo "	
                	<input type=\"number\" min=\"0\" max=\"".$product['Items_In_stock']."\" name =\"".$prod_id."\" value=\"".$qty."\"size=\"3\">";
            } else {
                echo $qty;
            }
            echo "</td>
                    <td>\$".number_format($product['price']*$qty,2)."</td>
                    </tr>\n";
        }
        
        //display total row
        echo "<tr>
                <th colspan=\"".(2+$images)."\">&nbsp;</td>
                <th>".$_SESSION['items']."</th>
                <th>\$".$_SESSION['total_price']."
                </th>
                </tr>";
        
        if($change == true) {
            echo '<button type="submit" name = "save" id ="cartbutton">Update Cart</button>';
        }
        
        echo "</form></table>";
    } 
            
    /*
        Function to display form that allows user to enter credit card info.
        Uses fake card companies and takes only letters as replacement for a card number.
    */
    function display_card_form() {
        
        echo '
            <section class = "change_info">
            <h2>New Credit Card Details</h2>
            
            <form method="post" action="joe_process.php" class = "change_info">
            <h4>Card Type</h4>
                <select name="card_type">
                    <option>Best Card</option>
                    <option>Magic Conch</option>
                    <option>Rock Bottom</option>
                    <option>Glad</option>
                </select> 
            <br>
            <h4>Card Letter Sequence</h4>
            <input type= "text" maxlength="16" pattern = "[A-Za-z]{16}" title = "Card sequence can only consist of letters and must be 16 in length" name= "card_letters" placeholder = "Card Letter Sequence" style="width: 280px; height: 35px;"/> 
            <br>
            <h4>Expiration Date</h4>
            <h4>Month: <select name="card_month">
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select> </h4>
            <h4>Year: <select name="card_year">
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                    <option>2023</option>
                </select> </h4>
            <br>
            <h4>Name on Card</h4>
            <input type= "text" name= "card_name" pattern="[0-9A-Za-z ]{1,50}" title="Card names can only be a combination of letters" placeholder = "Name on Card" style="width: 280px; height: 35px;"/>
            <br>
            <hr>
            <br>
            <p>Press Confirm Order to confirm order or Continue to edit cart</p>
            <button type="submit">Confirm Order</button>
            </form><br><hr><br>'
            
            ;
    }

    //Displays a checkout form for the customer
    function display_checkout_form() {
        
        //Gives customer option to select stored billing or shipping address to use for order
        echo "<h2>Choose Stored Billing and Shipping Address or enter new ones</h2>";
        
        $conn = db_connect();
        $query = "SELECT c_id FROM Customer WHERE c_username = '".$_SESSION['valid_user']."'";
        $result = $conn->query($query);
        $customer = $result->fetch_object();
        $customerid = $customer->c_id;
        
        //Gets all billing addresses belonging to this customer
    	$query = "SELECT * FROM b_address WHERE c_id = '".$customerid."'";
    	
    	$result = $conn->query($query);
    	
    	$result = db_result_to_array($result);
    	
    	echo "<br><h4>Billing Addresses: </h4><p>";
    	
        //displays each billing address
    	foreach ($result as $row) {
    	
    		echo "
    			Address #".$row['b_address_id'].": 
        		".$row['b_fname']." ".$row['b_lname']." <br>
        		".$row['b_street']." <br>
        		".$row['b_city']." ".$row['b_state']." ".$row['b_zip_code']."</p><br>";
    	}
    	
        //Gets all shipping addresses belonging to this customer
        $query = "SELECT * FROM s_address WHERE c_id = '".$customerid."'";
    	
    	$result = $conn->query($query);
    	
    	$result = db_result_to_array($result);
    	
    	echo  "<br><h4>Shipping Addresses: </h4><p>";
    	
        //displays each shipping address
    	foreach ($result as $row) {
    	
    		echo "
    			Address #".$row['s_address_id'].": 
        		".$row['s_fname']." ".$row['s_lname']." <br>
        		".$row['s_street']." <br>
        		".$row['s_city']." ".$row['s_state']." ".$row['s_zip_code']."</p><br>";
    	}
    	
        /*
            Gets all billing and shipping addresses and then creates a small drop down menu allowing the user to choose the address number for each billing/shipping address.
            The two addresses chosen will be used for the order.
        */
        
    	$query = "SELECT * FROM b_address WHERE c_id = '".$customerid."'";
    	
    	$result = $conn->query($query);
    	
    	$result = db_result_to_array($result);
    	
    	echo '<form action = "joe_purchase.php" method = "post" enctype="multipart/form-data" class = "change_info">
    	
    		<h4>Choose Billing Address: <select name = "b_id">
    		<option disabled selected value>Address #</option>';
    	foreach ($result as $row) {
    		echo "<option>".$row['b_address_id']."</option>";
    	}
    	echo '</select></h4>';
        
        $query = "SELECT * FROM s_address WHERE c_id = '".$customerid."'";
    	
    	$result = $conn->query($query);
    	
    	$result = db_result_to_array($result);
    	
    	echo '<h4>Choose Shipping Address: <select name = "s_id">
    		<option disabled selected value>Address #</option>';
    	foreach ($result as $row) {
    		echo "<option>".$row['s_address_id']."</option>";
    	}
    	echo '</select></h4><br><hr><br>';
        
        
        //Form for entering new billing or shipping address.
        echo '
            <h2>New Billing Address (Leave blank if using stored address)</h2>
            
            <h4>First Name</h4>
            <input type= "text" name= "fname" pattern="[a-zA-Z]{1,25}" title="First names must be letters 1-25 characters in length" placeholder = "First Name" style="width: 280px; height: 35px;"/>
            <br>
            <h4>Last Name</h4>
            <input type= "text" name= "lname" pattern="[a-zA-Z]{1,25}" title="Last names must be letters 1-25 characters in length" placeholder = "Last Name" style="width: 280px; height: 35px;"/>
            <br>
            <h4>Street</h4>
            <input type= "text" name= "street" pattern="[0-9A-Za-z -]{1,25}" title="Street names can only be a combination of letters and numbers" placeholder = "Street" style="width: 280px; height: 35px;"/>
            <br>
            <h4>City</h4>
            <input type= "text" name= "city" pattern="[a-zA-Z]{1,25}" title="City names must be letters 1-25 characters in length" placeholder = "City" style="width: 280px; height: 35px;"/>
            <br>
            <h4>State</h4>
            <select name="state">
                <option disabled selected value>Select a State</option>
            	<option>Alabama</option>
            	<option>Alaska</option>
            	<option>Arizona</option>
            	<option>Arkansas</option>
            	<option>California</option>
            	<option>Colorado</option>
            	<option>Connecticut</option>
            	<option>Delaware</option>
            	<option>Florida</option>
            	<option>Georgia</option>
            	<option>Hawaii</option>
            	<option>Idaho</option>
            	<option>Illinois</option>
            	<option>Indiana</option>
            	<option>Iowa</option>
            	<option>Kansas</option>
            	<option>Kentucky</option>
            	<option>Louisiana</option>
            	<option>Maine</option>
            	<option>Maryland</option>
            	<option>Massachusetts</option>
            	<option>Michigan</option>
            	<option>Minnesota</option>
            	<option>Mississippi</option>
            	<option>Missouri</option>
            	<option>Montana</option>
            	<option>Nebraska</option>
            	<option>Nevada</option>
            	<option>New Hampshire</option>
            	<option>New Jersey</option>
            	<option>New Mexico</option>
            	<option>New York</option>
            	<option>North Carolina</option>
            	<option>North Dakota</option>
            	<option>Ohio</option>
            	<option>Oklahoma</option>
            	<option>Oregon</option>
            	<option>Pennsylvania</option>
            	<option>Rhode Island</option>
            	<option>South Carolina</option>
            	<option>South Dakota</option>
            	<option>Tennessee</option>
            	<option>Texas</option>
            	<option>Utah</option>
            	<option>Vermont</option>
            	<option>Virginia</option>
            	<option>Washington</option>
            	<option>West Virginia</option>
            	<option>Wisconsin</option>
            	<option>Wyoming</option>
            </select>
            <br>
            <h4>Zip Code</h4>
            <input type= "text" name= "zip" maxlength="5" pattern= "[0-9]{5}" title="Zip codes must be a combination of numbers of length 5"  placeholder = "Zip Code" style="width: 280px; height: 35px;"/>
            
            <br><hr><br>
            
            <h2>New Shipping Address (Leave blank if same as above or using stored address)</h2>
            <h4>First Name</h4>
            <input type= "text" name= "ship_fname" pattern="[a-zA-Z]{1,25}" title="First names must be letters 1-25 characters in length" placeholder = "First Name" style="width: 280px; height: 35px;"/>
            <br>
            <h4>Last Name</h4>
            <input type= "text" name= "ship_lname" pattern="[a-zA-Z]{1,25}" title="Last names must be letters 1-25 characters in length" placeholder = "Last Name" style="width: 280px; height: 35px;"/>
            <br>
            <h4>Street</h4>
            <input type= "text" name= "ship_street" pattern="[0-9A-Za-z -]{1,25}" title="Street names can only be a combination of letters and numbers" placeholder = "Street" style="width: 280px; height: 35px;"/>
            <br>
            <h4>City</h4>
            <input type= "text" name= "ship_city" pattern="[a-zA-Z]{1,25}" title="City names must be letters 1-25 characters in length" placeholder = "City" style="width: 280px; height: 35px;"/>
            <br>
            <h4>State</h4>
            <select name="ship_state">
                <option disabled selected value>Select a State</option>
            	<option>Alabama</option>
            	<option>Alaska</option>
            	<option>Arizona</option>
            	<option>Arkansas</option>
            	<option>California</option>
            	<option>Colorado</option>
            	<option>Connecticut</option>
            	<option>Delaware</option>
            	<option>Florida</option>
            	<option>Georgia</option>
            	<option>Hawaii</option>
            	<option>Idaho</option>
            	<option>Illinois</option>
            	<option>Indiana</option>
            	<option>Iowa</option>
            	<option>Kansas</option>
            	<option>Kentucky</option>
            	<option>Louisiana</option>
            	<option>Maine</option>
            	<option>Maryland</option>
            	<option>Massachusetts</option>
            	<option>Michigan</option>
            	<option>Minnesota</option>
            	<option>Mississippi</option>
            	<option>Missouri</option>
            	<option>Montana</option>
            	<option>Nebraska</option>
            	<option>Nevada</option>
            	<option>New Hampshire</option>
            	<option>New Jersey</option>
            	<option>New Mexico</option>
            	<option>New York</option>
            	<option>North Carolina</option>
            	<option>North Dakota</option>
            	<option>Ohio</option>
            	<option>Oklahoma</option>
            	<option>Oregon</option>
            	<option>Pennsylvania</option>
            	<option>Rhode Island</option>
            	<option>South Carolina</option>
            	<option>South Dakota</option>
            	<option>Tennessee</option>
            	<option>Texas</option>
            	<option>Utah</option>
            	<option>Vermont</option>
            	<option>Virginia</option>
            	<option>Washington</option>
            	<option>West Virginia</option>
            	<option>Wisconsin</option>
            	<option>Wyoming</option>
            </select>
            <br>
            <h4>Zip Code</h4>
            <input type= "text" name= "ship_zip" maxlength="5" pattern= "[0-9]{5}" title="Zip codes must be a combination of numbers of length 5"  placeholder = "Zip Code" style="width: 280px; height: 35px;"/>
            <br><hr><br>
            <p>Press Cofirm Order to confirm order or Continue to edit cart</p>
            <button type="submit">Confirm Order</button>
            </form><br><hr><br>
            ';
    }
    
    //function that displays shipping row for checkout and receipt
    function display_shipping($shipping) {
        echo '	<br><hr><br>
        	<table>
        	<tr>
                <td colspan="3">Shipping</td>
                <td>$'.$shipping.'</td>
              </tr>
              <tr>
                <th colspan="3">Total Including Shipping</th>
                <th>$'.($_SESSION['total_price'] + $shipping).'</th>
              </tr>
              </table>'
            ;
    }
    
    //function that displays billing and shipping addresses used at checkout
    function display_addresses_checkout($baddressid, $saddressid) {
    
    	$conn = db_connect();
    	$query = "SELECT * FROM b_address WHERE b_address_id = '".$baddressid."'";
    	
    	$result = $conn->query($query);
    	
    	$result = db_result_to_array($result);
    	
    	foreach ($result as $row) {
    	
    		echo "<br><hr><br><h4>Billed to: </h4><p>
        		".$row['b_fname']." ".$row['b_lname']." <br>
        		".$row['b_street']." <br>
        		".$row['b_city']." ".$row['b_state']." ".$row['b_zip_code']."</p><br><hr><br>";
    	}
    	
    	$query = "SELECT * FROM s_address WHERE s_address_id = '".$saddressid."'";
    	
    	$result = $conn->query($query);
    	
    	$result = db_result_to_array($result);
    	
    	foreach ($result as $row) {
    		
    		echo "<h4>Shipped to: </h4><p>
        		".$row['s_fname']." ".$row['s_lname']." <br>
        		".$row['s_street']." <br>
        		".$row['s_city']." ".$row['s_state']." ".$row['s_zip_code']."</p><br><hr><br>";
    	}
    	
    
    }
    
    

?>