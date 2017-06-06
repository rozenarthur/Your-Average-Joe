<?php
session_start();
if(isset($_SESSION['valid_user'])) {
    
    /*
        Menu used throughout site.
        Has four tabs for customers and three for other users:
        
        Home: redirects user to the front page of the site. Shown to all users.
        
        Products: Dropdown menu. User can click Categories or Brands to browse through categories or brands available. Hovering over either will show a list of available categories and brands in the menu itself. Clicking on these will display all products of that category or brand. Shown to all users.
        
        Profile: Profile page for the user. Clicking on it will direct users to a small menu that changes depending on what type of user they are logged in as.
            Customers: Will be able to view their order history, manage personal information (name, email, stored billing and shipping addresses), and change password.
            Employees: Cannot see order history (Employees cannot buy anything from the site), ability to manage personal information (just name and email), change password, and ability to update to view all orders and alter the status of that order (to Shipped or Delivered).
            Database Administrator: Has all abilities that employee has in this menu(except being able to change email).
            Owner: Same as Database Administrator, but with the ability to create and edit employee accounts.
        
        View Cart: Only usable by customers. Allows the user to buy products and view what they have in their cart. Hovering over tab will show how many items are in cart and the current total price.
        
        The site also includes a search bar that allows users to browse through products.
            
    */
    
    //requires all site functions
    require_once('joe_average_fns.php');
    
    //arrays holding all categories and brands. Used to display categories and brands in menu.
    $cat_array = get_categories();
    $brand_array = get_brands();

    //sets session variables to be used by other parts of the site if they do not already exist.
    
    //keeps track of items in cart
    if (!$_SESSION['items']) {
        $_SESSION['items'] = '0';
    }
    //keeps track of total price of items in cart
    if (!$_SESSION['total_price']) {
        $_SESSION['total_price'] = '0';
    }
    
    if (!$_SESSION['b_address']) {
        $_SESSION['b_address'] = '0';
    }
    if (!$_SESSION['s_address']) {
        $_SESSION['s_address'] = '0';
    }
    if (!$_SESSION['ord_id']) {
        $_SESSION['ord_id'] = '0';
    }
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Your Average Joe</title>
        <!--Stylesheet-->
        <link rel="stylesheet" type="text/css" href="joestyle.css" />
    </head>
    
    <body>
        
        <article>
            <h1>Your Average Joe</h1>
		<div class = "search">
			<!-- sends form to database-->
			<form method="post" action="joe_search_results.php"> 
				<input type= "text" name= "search" pattern="[0-9A-Za-z -.,]{1,500}" title="Search only accepts letters, numbers, spaces, periods and dashes" placeholder = "Search..." required='required'/>
				<button type="submit">Search</button>
            </form>
		</div>
		
            <nav id="menu">
                                          
                <ul>
                                   
                    <li><a href="joe_front_page.php">Home</a></li>
                    <li>
                        <a href="joe_show_product_all.php">Products<span>&#9662;</span></a>                      
                        <ul>
                            <li>
                                <a href="joe_all_category.php">Categories<span>&#9656;</span></a>
                                
                                <?php display_categories($cat_array); ?>
                            </li>
                            <li>
                                <a href="joe_all_brands.php">Brands<span>&#9656;</span></a>
                                
                                <?php display_brands($brand_array); ?>
                            </li>
                        </ul>
                    </li> 
                    <li><a href="joe_profilepage.php">Profile<span>&#9662;</span></a>
                        <ul>
                            <?php
                            //check to see that user is a customer
                            if(!isset($_SESSION['owner_user']) && !isset($_SESSION['DB_user']) && !isset($_SESSION['employee_user'])) {
                                echo "<li><a href='joe_order_history.php'>View Order History</a></li>";
                            }
                            ?>
                            <li><a href="joe_change_info_form.php">Manage Information</a></li>
                            
                            <li><a href="joe_change_password_form.php">Change Your Password</a></li>
                               
                            <?php 
                            //check to see that user is an owner
	        	            if(isset($_SESSION['owner_user'])) {
	        		             echo "<li> <a href= 'joe_create_or_update_employee_form.php'>Create/Update Employee information</a> </li>";
                            }
	       		            ?>
	       		            <?php
                            //check to see that user is NOT a customer
	       		            if(isset($_SESSION['owner_user']) || isset($_SESSION['DB_user']) || isset($_SESSION['employee_user'])) {
	                           echo "<li> <a href= 'joe_update_orders.php'>Update Order Statuses</a> </li>"; }
                            ?>
                            
                            <?php
                            //check to see that user is owner
	       		            if(isset($_SESSION['owner_user'])) {
	                           echo "<li> <a href= 'joe_view_employees.php'>View Employees</a> </li>"; }
                            ?>
                            <?php
                            //check to see that user is a customer
                            if(!isset($_SESSION['owner_user']) && !isset($_SESSION['DB_user']) && !isset($_SESSION['employee_user'])) {
                                echo '<li><a href="joe_logout.php">LOG OUT</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    //check to see that user is a customer
                    if(!isset($_SESSION['owner_user']) && !isset($_SESSION['DB_user']) && !isset($_SESSION['employee_user'])) {
                    echo "<li><a href='joe_show_cart.php'>View Cart</a>";
                    }
                    ?>
                    	<ul>
                            <!-- Allows a cutomer to see information from cart by hovering over the View Cart Tab-->
                    	    <li><a>Total Items: <?php echo $_SESSION['items'] ?></a></li>
                    	    <li><a>Total Price: $<?php echo $_SESSION['total_price'] ?></a></li>
                    	</ul>
                    	<?php
                            //check to see that user is NOT a customer
	       		            if(isset($_SESSION['owner_user']) || isset($_SESSION['DB_user']) || isset($_SESSION['employee_user'])) {
	                           echo '<li><a href="joe_logout.php">LOG OUT</a></li>'; }
                            ?>
                    </li>
                </ul>
            </nav>
    
            <section id="front">
<?php
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>