<?php
    
session_start();

if(isset($_SESSION['valid_user'])) {//checks if user is logged in
    
    
    require_once('joe_db_fns.php');
    //checks if user is not employee, DB admin, or owner than throw an error
    if(!(isset($_SESSION['employee_user']) || isset($_SESSION['DB_user']) || isset($_SESSION['owner_user']))) {

        throw new Exception('You do not have Access to this Page');
    }   
    
    require_once('joe_menus.php');
    $p_id = $_GET['p_id']; //gets p_id from the product's profile that you clicked on
    ?>

    <section class= "change_info">

    <h4>Update Quantity</h4>

    <p>

    <form action="joe_quant_update_results.php?p_id=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
    <input type= "number" min="0" name= "quantity" placeholder = "Enter new amount of Stock" style="width: 280px; height: 35px;"/>

    <button type="submit">Update</button>

    </p>

    </section>

<?php

    require_once('joe_footer.php');
    } else {//if user not logged in redirect them to login page 
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
     }
?>

