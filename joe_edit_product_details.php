<?php
    session_start();
if(isset($_SESSION['valid_user'])) {//checks if user is logged in 
    
    require_once('joe_menus.php');
    require_once('joe_db_fns.php');
     //if user user is not a DB admin or owner throw an error  
    if(!(isset($_SESSION['DB_user']) || isset($_SESSION['owner_user']))) {

        throw new Exception('You do not have Access to this page');
    }

    $p_id = $_GET['p_id'];

    $conn = db_connect();
    $result = $conn->query("SELECT * FROM Product WHERE prod_id ='".$p_id."'");//queries products based on retrived productid from their product profile page 

    if ($result->num_rows > 0) {//if query has at least 1 row than than you can operate on them
    $row = $result->fetch_assoc();
    } else {
       echo "0 results";
    }
    
?>
    <section class= "change_info">

<h2>Edit Product Details</h2><br><hr><br>

<p><h4>Name: <?php echo $row['name']; ?></h4>
<form action="joe_edit_product_details_results.php?p_id=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
<input type= "text" name= "prod_name" pattern="[0-9A-Za-z -.]{1,25}" title="Product names can only consist of letters, numbers, spaces, dashes, and periods." placeholder = "Update Product Name" style="width: 280px; height: 35px;"/>
<button type="submit">Update</button></p><br><hr><br>

<p><h4>Description: <?php echo $row['p_desc'] ?></h4>
<form action="joe_edit_product_details_results.php?p_id=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
<input type= "text" name= "prod_desc" pattern="[0-9A-Za-z -.]{1,25}" title="Product descriptions can only consist of letters, numbers, spaces, dashes, and periods." placeholder = "Update Product Description" style="width: 280px; height: 35px;"/>
<button type="submit">Update</button></p><br><hr><br>

<p><h4>Price: <?php echo $row['price'] ?></h4>
<form action="joe_edit_product_details_results.php?p_id=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
<input type= "number" min="0" step="0.01" onchange="setTwoNumberDecimal" name= "prod_price" placeholder = "Update Product Price" style="width: 280px; height: 35px;"/>
<button type="submit">Update</button></p><br><hr><br>

<p><h4>Image</h4>
<form action="joe_add_product_results.php" method="post" enctype="multipart/form-data">
<input type= "file" name= "prod_image">
<button type="submit">Update</button></p><br><hr><br>

<p><h4>Category ID: <?php echo $row['Category_id'] ?></h4>
<form action="joe_edit_product_details_results.php?p_id=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
<input type= "number" min="1" max="7" name= "prod_category" placeholder = "Update Category ID (1-7)" style="width: 280px; height: 35px;"/>
<button type="submit">Update</button></p><br><hr><br>

<p><h4>Brand ID: <?php echo $row['brand_id'] ?></h4>
<form action="joe_edit_product_details_results.php?p_id=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
<input type= "number" min="1" max="15" name= "prod_brand" placeholder = "Update Brand ID (1-15)" style="width: 280px; height: 35px;"/>
<button type="submit">Update</button></p><br><hr><br>

<p><h4>Shipper ID: <?php echo $row['Shipper_id'] ?></h4>
<form action="joe_edit_product_details_results.php?p_id=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
<input type= "number" min="1" max="3" name= "prod_shipper" placeholder = "Update Shipper ID (1-3)" style="width: 280px; height: 35px;"/>
<button type="submit">Update</button></p><br><hr><br>

<p><h4>Supplier ID: <?php echo $row['Supplier_id'] ?></h4>
<form action="joe_edit_product_details_results.php?p_id=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">
<input type= "number" min="1" max="3" name= "prod_supplier" placeholder = "Update Supplier ID (1-3)" style="width: 280px; height: 35px;"/>
<button type="submit">Update</button></p><br><hr><br>

<input type = "submit" value= "Delete This Product" name = "delete"/> 
</section>

<?php
    require_once('joe_footer.php');
} else {//if user is not logged in redirect them to login page
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>