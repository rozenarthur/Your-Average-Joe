<?php
session_start();
if(isset($_SESSION['valid_user'])) {//checks if user is logged in
    
    require_once('joe_menus.php');
    require_once('joe_db_fns.php');
    
//checks if user is not an DB admin or owner than gives them an error
    if(!(isset($_SESSION['DB_user']) || isset($_SESSION['owner_user']))) {

        throw new Exception('You do not have Access to this page');
    }

    $conn = db_connect();

     echo ' 
     
    <section class= "change_info">

    <h2>Add a Product</h2>

    <p>Please fill in all Fields!</p><br><hr><br>

    <p><h4>Name</h4> 
    <form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
    <input type= "text" name= "prod_name" placeholder = "Enter Name" style="width: 280px; height: 35px;"/></p>

    <p><h4>Description</h4>
    <form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
    <input type= "text" name= "prod_desc" placeholder = "Enter Description" style="width: 280px; height: 35px;"/></p>

    <p><h4>Price</h4>
    <form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
    <input type= "number" min="0" step="0.01" onchange="setTwoNumberDecimal" name= "prod_price" placeholder = "Enter Price" style="width: 280px; height: 35px;"/></p>

    <p><h4>Image</h4>
    <form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
    <input type= "file" name= "prod_image"></p>

    <p><h4>Category ID</h4>
    <form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
    <input type= "number" min="1" max="7" name= "prod_cate" placeholder = "Enter Category ID (1-7)" style="width: 280px; height: 35px;"/></p>

    <p><h4>Brand ID</h4>
    <form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
    <input type= "number" min="1" max="15" name= "prod_brand" placeholder = "Enter Brand ID (1-15)" style="width: 280px; height: 35px;"/></p>

    <p><h4>Shipper ID</h4>
    <form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
    <input type= "number" min="1" max="3" name= "prod_shipper" placeholder = "Enter Shipper ID (1-3)" style="width: 280px; height: 35px;"/></p>

    <p><h4>Supplier ID</h4>
    <form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
    <input type= "number" min="1" max="3" name= "prod_supplier" placeholder = "Enter Supplier ID (1-3)" style="width: 280px; height: 35px;"/></p>

    <p><button type="submit">Submit</button></p><br><hr><br>

    </section>';


    require_once('joe_footer.php');
} else {//if user not logged in redirects them to login page
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>