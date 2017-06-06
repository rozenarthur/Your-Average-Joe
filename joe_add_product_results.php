<?php
session_start();
if(isset($_SESSION['valid_user'])) {//checks if user is logged in
    
    require_once('joe_db_fns.php');
    require_once('joe_average_fns.php');

    //uploads the Image file to the images folder
    $target_dir = "/home/wieseld/public_html/cgi-bin/youraveragejoe/Images/"; //variable for location of Images folder 
    $target_file = $target_dir . basename($_FILES["prod_image"]["name"]);//concatenates string,  location of Image folder with the uploaded image  
    move_uploaded_file($_FILES["prod_image"]["tmp_name"], $target_file);//moves the uploaded image to the Images folder


    $conn = db_connect();

    $name = $_POST['prod_name']; //gets text entered from name textfield in joe_add_product.php
    $desc = $_POST['prod_desc'];
    $price = $_POST['prod_price'];
    $img = basename($_FILES["prod_image"]["name"]); //gets image uploaded from image textfield
    $cate = $_POST['prod_cate'];
    $brand = $_POST['prod_brand'];
    $ship = $_POST['prod_shipper'];
    $supp = $_POST['prod_supplier'];

    $im = "b";
    $img_url = "https://blue.cs.montclair.edu/~wieseld/cgi-bin/youraveragejoe/Images/".$img; //url for new uploaded image

    if ($name && $desc && $img && $price && $cate && $brand && $ship && $supp){//checks if every textfield in joe_add_product.php is filled out 
        //queries the new info from textfields by inserting them into their proper DB attributes 
    $result = $conn->query("INSERT INTO Product (name, p_desc, image, price, Category_id, brand_id, Shipper_id, Supplier_id) 
     VALUES ('".$name."', '".$desc."', '".$img_url."', ".$price.", ".$cate.", ".$brand.", ".$ship.", ".$supp.")");
    }

    if(!$result){//if any textfield is blank throw an error

    throw new exception('Could not Add Product!'); 
    }

    require_once('joe_menus.php');


    echo "
    <div id='login'>
    <h2>Information was added!</h2>
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