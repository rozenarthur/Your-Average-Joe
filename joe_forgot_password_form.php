<?php
    
    require_once('joe_login_header.php');
?> 

            <!-- Form for resetting password. Prompts customer to enter username.-->

            <div id='login'>
                    <h2>Reset Password</h2>
                    <form method="post" action="joe_forgot_password.php">
                        <input type='text' name='username' placeholder="Enter username" required='required' />
                        <button type='submit'>Change Password</button>
                    </form>

            </div>
        
    </body>
    
</html>

