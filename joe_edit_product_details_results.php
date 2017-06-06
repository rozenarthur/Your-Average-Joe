<?php
session_start();
if(isset($_SESSION['valid_user'])) {//checks if user is logged in
	
	require_once('joe_db_fns.php');
    require_once('joe_average_fns.php');

    //uploads the Image file to the images folder
    $target_dir = "/home/wieseld/public_html/cgi-bin/youraveragejoe/Images/";//directory for Images folder
    $target_file = $target_dir . basename($_FILES["prod_image"]["name"]);// concatenates string for directory of Image folder and uploaded image file
    move_uploaded_file($_FILES["prod_image"]["tmp_name"], $target_file); //moves the uploaded image to the Images folder

    $conn = db_connect();
    $p_id = $_GET['p_id'];

    $name = $_POST['prod_name']; //gets text from name textfield from joe_edit_product_details.php
    $desc = $_POST['prod_desc'];
    $price = $_POST['prod_price'];
    $cate = $_POST['prod_category'];
    $brand = $_POST['prod_brand'];
    $ship = $_POST['prod_shipper'];
    $sup = $_POST['prod_supplier'];
    $delete = $_POST['delete'];

    $img = basename($_FILES["prod_image"]["name"]);
    $img_url = "https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/".$img; //url for new uploaded image 


    if ($name){ //if name textfield is entered change the value of name attribute in the database to the new value 

    $result = $conn->query("UPDATE Product SET name = '".$name."' WHERE prod_id = '".$p_id."'");
    }

    if($desc){

    $result = $conn->query("UPDATE Product SET p_desc = '".$desc."' WHERE prod_id = '".$p_id."'");
    }

    if($price){

    $result = $conn->query("UPDATE Product SET price = '".$price."' WHERE prod_id = '".$p_id."'");
    }

    if($img){
    $result = $conn->query("UPDATE Product SET image = '".$img_url."' WHERE prod_id = '".$p_id."'");
    }

    if($cate){

    $result = $conn->query("UPDATE Product SET Category_id = '".$cate."' WHERE prod_id = '".$p_id."'");
    }

    if($brand){

    $result = $conn->query("UPDATE Product SET brand_id = '".$brand."' WHERE prod_id = '".$p_id."'");
    }

    if($ship){

    $result = $conn->query("UPDATE Product SET Shipper_id = '".$ship."' WHERE prod_id = '".$p_id."'");
    }

    if($sup){

    $result = $conn->query("UPDATE Product SET Supplier_id = '".$sup."' WHERE prod_id = '".$p_id."'");
    }

    if($delete){ //if delete button is clicked, delete the product that is being edited  

    $result = $conn->query("DELETE FROM Product WHERE prod_id = '".$p_id."'");
    }

    if(!$result){ //if no textfield is selected throw an error

    throw new Exception('Could not Update Product!');
    }

    require_once('joe_menus.php');

    echo "
    <div id='login'>
    <h2>Information was updated!</h2>
    </div>
    </section>
    </article>
    </body>
    </html>";
} else {//if user is not logged in redirect them to login page
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>