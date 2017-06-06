<?php
    session_start();
if(isset($_SESSION['valid_user'])) {
    require_once('joe_average_fns.php');
    
    
    //short variable names
    $old_passwd = $_POST['old_passwd'];
    $new_passwd = $_POST['new_passwd'];
    $new_passwd2 = $_POST['new_passwd2'];
    
    //check to see if both new passwords are the same. If so, redirects user to login page with a message
    if ($new_passwd != $new_passwd2) {
        require_once('joe_login_header.php');
        require_once('joe_not_same_pwd.php');
        exit;
    }
    
    //check to see if new password is between 6 and 16 characters
    if ((strlen($new_passwd) > 16) || (strlen($new_passwd) < 6)) {
        require_once('joe_login_header.php');
        require_once('joe_not_proper_length.php');
        exit;
    }
    
    //attempt to change password
    change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
    require_once('joe_login_header.php');
    
    //message to inform user that password has been changed.
    echo '<div id="login">
                    <h2>Your Password has been changed!<h2/>
                    <form method="post" action="joe_profilepage.php">
                        <button type="submit">Back</button>
                    </form>
                </div>
                </section>
                </article>
                </body>
        </html>';
} else {
        header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>