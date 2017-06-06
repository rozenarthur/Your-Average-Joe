<?php
    /*
        Form for registration.
        Prompts user for first and last name, email address, username, password, and access code.
    */
    session_start();
    require_once('joe_average_fns.php');
    require_once('joe_login_header.php');
?>
    <div id='login'>
                    <h2>Register</h2>
                    <form method="post" action="joe_register_new.php">
                    	<input type='text' name='fname' pattern="[a-zA-Z]{1,25}" title="First names must be letters 1-25 characters in length" placeholder="First Name" required='required' />
                        <input type='text' name='lname' pattern="[a-zA-Z]{1,25}" title="Last names must be letters 1-25 characters in length" placeholder="Last Name" required='required' />
                        <input type='text' name='email' placeholder="Email Address" required='required' />
                        <input type='text' name='username' pattern="[a-zA-Z0-9_]{6,25}" title="Usernames can only consist of letters and numbers and must be 6-25 characters in length" placeholder="Username" required='required' />
                        <input type='password' name='passwd' pattern="[a-zA-Z0-9]{6,16}" title="Passwords can only consist of letters and numbers and must be 6-16 characters in length" placeholder="Password" required='required' />
                        <input type='password' name='passwd2' pattern="[a-zA-Z0-9]{6,16}" title="Passwords can only consist of letters and numbers and must be 6-16 characters in length" placeholder="Confirm Password" required='required' />
                        <input type='password' name='accesscode' pattern="[a-zA-Z0-9]{6,16}" placeholder="Access Code" required='required' />
                        <button type='submit'>Register</button>
                    </form>

            </div>
        
    </body>
    
</html>
