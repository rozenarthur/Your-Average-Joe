<?php

session_start();

if(isset($_SESSION['valid_user'])) {//checks if user is logged in
	
	require_once('joe_db_fns.php');
        require_once('joe_average_fns.php');

    $quantity = $_POST['quantity']; //gets the info quantity textfield from joe_quantity_update.php
    $p_id = $_GET['p_id'];

    $conn = db_connect();

    echo $p_id;


    //updates the quantity by placing the quantity variable into the DB 
    $result = $conn->query("UPDATE Product SET Items_In_stock = '".$quantity."' WHERE prod_id = '".$p_id."'");//updates the quantity


    if(!$result){//checks if quantity textfield is blank than throw an error
    throw new Exception('Could not update info!');
    }


    require_once('joe_menus.php');
?>

    <div id='login'>
    <h2>Information was updated!</h2>
    </div>
    </section>
    </article>
    </body>
    </html>  
<?php
    } else {//if user is not logged in redirect to login page
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>