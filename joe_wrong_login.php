<!-- Form that a user is redirected to when failing to log in-->             

        <div id='login'>
                    <h2>Login</h2>
                    <p id="wrong">The username or password you entered was not valid.</p>
                    <form method="post" action="joe_member.php">
                        <input type='text' name='username' pattern="[a-zA-Z0-9_]{6,25}" title="Usernames can only consist of letters and numbers and must be 6-25 characters in length" placeholder="Username" required='required' />
                        <input type='password' name='passwd' pattern="[a-zA-Z0-9]{6,16}" title="Passwords can only consist of letters and numbers and must be 6-16 characters in length" placeholder="Password" required='required' />
                        <p><a href="joe_forgot_password_form.php">Forgot password?</a></p>
                        <p><a href="joe_registration_form.php">Not a member? Register Here</a></p>
                        <button type='submit'>Login</button>
                    </form>

            </div>
        
    </body>
    
</html>

