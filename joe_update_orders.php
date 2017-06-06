<?php 
session_start();
if(isset($_SESSION['valid_user'])) {
    
    /*
        Script that allows non-customers to change the status of any order ever made on the site
    */

    //check to see if user is not a customer
    if(isset($_SESSION['employee_user']) || isset($_SESSION['DB_user']) || isset($_SESSION['owner_user'])) {
        
        require_once('joe_average_fns.php');
        require_once('joe_menus.php');
        
        echo "<h2>Update Orders</h2><hr><br>";
        
        $conn = db_connect();
        //query to get all orders from database
        $query = "SELECT * FROM Orders";
        $result = $conn->query($query);
        
        //displays order information with option to change order status
        foreach ($result as $row) {
            
            echo "<h4>Order: #".$row['ord_id']."</h4>
        		<p>Date ordered: ".$row['date']."<br>
        		Order Status: ".$row['order_status']."<br>
        		Shipped to: <br>
        		".$row['ship_fname']." ".$row['ship_lname']." <br>
        		".$row['ship_street']." <br>
        		".$row['ship_city']." ".$row['ship_state']." ".$row['ship_zip']."</p><br>";
        	$ordered_items_array = get_order_details($row['ord_id']);
        	echo "<table><tr><th colspan='1'>Product name</th>
        		<th>Item Price</th>
        		<th>Quantity</th>
        		<th>Total</th></tr>";
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
              </table>";
        	
            
            echo '<form action = "joe_change_order_status.php?ord_id='.$row['ord_id'].'" method = "post" enctype="multipart/form-data" class = "change_info">
                <select name = "update">
                    <option disabled selected value>Update Status</option>
                    <option>Shipped</option>
                    <option>Delivered</option>
                </select>
                <button type="submit">Update</button>
                </form>';
                echo "<br><hr><br>";
        }
        
        require_once('joe_footer.php');
        
    } else {
        
        echo "<p>You are not allowed to view this page.</p>";
    }

} else {
    header('refresh: 5; url=index.php');
    echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
     
}

?>