<?php

//starts a session
session_start();

/*
    Check to see if person viewing this page is a valid user that has reached the page
    through login. If not, then echos a message telling the user that they are not logged in and redirects them to the login page after 5 seconds.
*/

if(isset($_SESSION['valid_user'])) {
    //displays menu
    require_once('joe_menus.php');
?>

<!-- Front page of website. Just basic info and background information of the site and owner-->

<h2>Welcome to Your Average Joe!</h2>

<p>Your Average Joe is your go-to online shop for anything coffee related! From coffee bags  to K-Cups to the actual machines themselves, Your Average Joe will be able to satisfy your coffee needs!</p>
                
<p>Not a coffee fan? Well, you should be! But while you work on that, we also have a variety of teas, hot chocolate, and other beverages that aren't as good as coffee! Whatever you need, Your Average Joe has it!</p>

<br><hr><br>

<h2>What are we about?</h2>
<p>
    Born and raised in the Netherlands, Joe Whatzittooya was on a quest. He wanted to bring people happiness. Moving to the United States during his early adulthood, Joe Whatzittyooya opened up a coffee retail shop. 
</p>
<p>
Wanting to expand his busniness further to make people everywhere happy, he opened up "Your Average Joe" onto the internet. With his great delivery services and vast amount of product, Joe knows that there is something that any customer (coffee lover or not) will enjoy!
</p>

<?php
    require_once('joe_footer.php');
} else {
    //redirects invalid user to login page after 5 seconds.
    header('refresh: 5; url=index.php');
    echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>
