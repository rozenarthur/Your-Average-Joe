<?php

    session_start();
    require_once('joe_average_fns.php');
    
    //short variable names
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $passwd=$_POST['passwd'];
    $passwd2=$_POST['passwd2'];
    $accesscode= $_POST['accesscode'];
    //start session
    
    $conn = db_connect();
    
    //gets encrypted access code from Owner
    //access code was just a way to keep people from registering from site that did not have permission to
    $correctcode = $conn->query("SELECT * FROM Owner
                            WHERE Access_code=sha1('".$accesscode."')");
    
    try {
        //checks to see if input was in valid email form
        if (!valid_email($email)) {
            throw new Exception('That is not a valid email address.
                                Please go back and try again.');
        }
        
        //check to see if passwords are not the same
        if($passwd != $passwd2) {
            throw new Exception('The passwords you entered do not match.
                                Please try again.');
        }
        
        //check if password length is okay
        if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
            throw new Exception('Your password must be between 6 and 16 characters.
                                Please go back and try again.');
        }
        //checks if access code is correct
        if (!$correctcode) {
            throw new Exception('Your access code was not correct. Please try   again.');
        }
        
        //attempt to register
        register($fname, $lname, $username, $passwd, $email);
        //register customer username as session variable
        $_SESSION['valid_user'] = $username;
        
        //provide link that logs new user in and displays front page
        require_once('joe_menus.php');
        ?>
        
                <div id='login'>
                    <h2>Registration was successful!<h2/>
                    <form method="post" action="joe_member.php">
                        <button type='submit'>Click to continue!</button>
                    </form>
               </div>
                </section>
                </article>
                </body>
        </html>


    <?php
    }
    
    catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }
?>