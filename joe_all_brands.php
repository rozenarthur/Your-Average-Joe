<?php
    session_start();
if(isset($_SESSION['valid_user'])) {//checks if user is logged in
    require_once('joe_menus.php');
    require_once('joe_average_fns.php');

    mysql_connect('localhost', 'wieseld', 'hetfield1994');
    mysql_select_db('wieseld_Your_Average_Joe');

    $sql= "SELECT * FROM Brand"; //gets Brands from database

    $records = mysql_query($sql);
    echo "
    <section>

    <h2>Brands</h2>";
    
    //loops until all Brands are printed
    while($Brand = mysql_fetch_assoc($records)){
    echo "<section class = 'all_catebrand'>";
    echo '<div><img src ="'. $Brand[image].'"> </img></div>';

    echo '<div>';
    $url = "joe_show_brand.php?Brand_id=".($Brand['Brand_id']); //displays assined brandid at the end of url 
    $title = $Brand[Brand_name];
    do_html_url($url, $title);

    echo "<p>".$Brand[description]."</p></div>";
    echo "</section>";
    }

    echo "</section>";

    require_once('joe_footer.php');
} else {//if user is not logged in redirect to log in
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>