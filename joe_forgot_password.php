<?php
    require_once("joe_average_fns.php");
    
    //Gets username from joe_forgot_password_form.php
    $username = $_POST['username'];
    
    //Tries to reset password
    try {
        $password = reset_password($username);
        //notifies user that password has been chanegd via notify_password function.
        notify_password($username, $password); 
        require_once('joe_login_header.php');
        ?>
                <!-- Notifies user that their new randomly generated password has been sent to them via email. -->
                    
                <div id='login'>
                    <h2>Your new password has been emailed to you.<h2/>
                    <form method="post" action="index.php">
                        <button type='submit'>Back</button>
                    </form>
                </div>
                </body>

        </html>
<?php
    }
    catch (Exception $e) {
        echo 'Your password could not be reset - please try again later.';
    }
?>