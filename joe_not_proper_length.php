<?php
if(isset($_SESSION['valid_user'])) {
?>

<!-- Form for when trying to change password and new password entered is not of proper length. Similiar to normal change password form, only with an error message-->

<div id='login'>
                    <h2>Change password</h2>
                    <p id="wrong">One or both of the passwords you entered were not proper length. Please try again.</p>
                    <form method="post" action="joe_change_password.php">
                        <input type='password' name='old_passwd' pattern="[a-zA-Z0-9]{6,16}" title="Passwords can only consist of letters and numbers and must be 6-16 characters in length" placeholder="Old Password" required='required' />
                        <input type='password' name='new_passwd' pattern="[a-zA-Z0-9]{6,16}" title="Passwords can only consist of letters and numbers and must be 6-16 characters in length" placeholder="New Password" required='required' />
                        <input type='password' name='new_passwd2' pattern="[a-zA-Z0-9]{6,16}" title="Passwords can only consist of letters and numbers and must be 6-16 characters in length" placeholder="Re-Enter New Password" required='required' />
                        <button type='submit'>Change Password</button>

            </div>
        
    </body>
    
</html>

<?php
} else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>