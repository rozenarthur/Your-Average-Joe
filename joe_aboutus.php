<?php
    
    if(isset($_SESSION['valid_user'])) {
    
    require_once('joe_menus.php');

    echo "
    <h2>What are we about?</h2>
    <p>
        Born and raised in the Netherlands, Joe Whatzittooya was on a quest. He wanted to bring people happiness. Moving to the United States during his early adulthood, Joe Whatzittyooya opened up a coffee retail shop. 
    </p>
    <p>
    Wanting to expand his busniness further to make people everywhere happy, he opened up "Your Average Joe" onto the internet. With his great delivery services and vast amount of product, Joe knows that there is something that any customer (coffee lover or not) will enjoy!
    </p>";


    require_once('joe_footer.php');
    } else {
        
        header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
    }
?>