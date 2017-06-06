<?php

    session_start();
    require_once('joe_average_fns.php');
    
    /*
        Script to log users in.
        Takes username and password input from index.php
    */
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    
    if ($username && $passwd) {
        //user tried logging in
        try {
                //attempt to log user in
            	login($username, $passwd);
             	//if they are in db register the user id
            	$_SESSION['valid_user'] = $username;
            	
        }
        catch(Exception $e) {
            //unsuccesful login
           require_once('joe_login_header.php');
            
           require_once('joe_wrong_login.php');
           
           exit;
        }
    }

    require_once('joe_front_page.php');

?>