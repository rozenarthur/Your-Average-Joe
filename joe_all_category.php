<?php
session_start();

//checks if user is logged into an acccount
if(isset($_SESSION['valid_user'])) {
    require_once('joe_menus.php');
    require_once('joe_average_fns.php');

    mysql_connect('localhost', 'wieseld', 'hetfield1994');
    mysql_select_db('wieseld_Your_Average_Joe');

    $sql= "SELECT * FROM Category"; //query to get the category

    $records = mysql_query($sql);
    
    echo"
    <section>

    <h2>Categories</h2>";

    //loop that gets all categories in database and prints them 
    while($Category = mysql_fetch_assoc($records)){
    echo "<section class = 'all_catebrand'>";
    echo '<div><img src ="'. $Category[c_image].'"> </img></div>';

    echo '<div>';
    $url = "joe_show_cat.php?category_id=".($Category['category_id']);//creates a category id for each product based on its categoryid from DB 
    $title = $Category[c_name];
    do_html_url($url, $title);//function that makes $title a link to another page and $url gets the category id from url

    echo "<p>".$Category[c_desc]."</p></div>";
    echo "</section>";
    }
    echo  "</section>";

    require_once('joe_footer.php');
} else {//if not logged in redirects them to log in page
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>