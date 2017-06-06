<?php

session_start();

if(isset($_SESSION['valid_user'])) {
    
    //Check to make sure that a normal customer cannot access page
    if(isset($_SESSION['employee_user']) || isset($_SESSION['DB_user']) || isset($_SESSION['owner_user'])) {
    require_once('joe_average_fns.php');
    
    //new updated order status from joe_update_orders.php
    $updatestatus = $_POST['update']; 
    //id of order being changed. taken from joe_update_orders.php
    $ord_id = $_GET['ord_id']; 
    $conn = db_connect();
    
    //query to update order status
    $query = "UPDATE Orders SET order_status = '".$updatestatus."' WHERE ord_id = '".$ord_id."'";
    $result = $conn->query($query);
        
        if(!result) {
            throw new Exception('Could not update order.');
        }
        
        //displays message to user that the order status has been updated
        require_once('joe_menus.php');
        echo '<div id="login">
            <h2>Information was updated!</h2>
	        <form method="post" action="joe_update_orders.php">
                        <button type="submit">Back</button>
                    </form>
                </div>
                </section>
                </article>
                </body>
        </html> ';
        
    } else {
        //message a customer seees when trying to access page
        echo "<p>You are not allowed to view this page.</p>";
    }
    
} else {
    
    header('refresh: 5; url=index.php');
    echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
     
}

?>