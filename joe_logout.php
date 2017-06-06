<?php
    session_start();
if(isset($_SESSION['valid_user'])) {
    
    /*
        Script that logs a user out.
        Unsets any session variables, destroys session, and then redirects to login page.
    */
    require_once('joe_average_fns.php');
  
    
    $old_user = $_SESSION['valid_user'];
    
    //store to test if they were logged in
    unset($_SESSION['valid_user']);
    unset($_SESSION['DB_user']);
    unset($_SESSION['employee_user']);
    unset($_SESSION['owner_user']);
    
    session_destroy();
    
    require_once('index.php');
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>