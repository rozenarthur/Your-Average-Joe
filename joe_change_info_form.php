<?php
session_start();
if(isset($_SESSION['valid_user'])) {
        
        require_once('joe_menus.php');
        require_once('joe_db_fns.php');

        $username = $_SESSION['valid_user'];


        $conn = db_connect();
        
        //Selects customer's id as a reference to future queries 
        $result = $conn->query("SELECT c_id FROM Customer WHERE c_username='".$username."'");
        $result = @$result->fetch_object();
        $customerid = $result->c_id;
	
	//Query is made so we can find values find in a specified row based on user log in
        $result = $conn->query("SELECT * FROM Customer WHERE c_username='".$username."'");

        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); 

                    } 
                
                
                
        //This block of code displays the view that the owner sees for this page        
        if(isset($_SESSION['owner_user']))
        {
        //Select's Owner information, so we can find specified values
         $result = $conn->query("SELECT * FROM Owner WHERE o_username='".$username."'");

        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); 

                    } 
        echo '<h2>Logged In As: '.$username.'</h2><br><hr><br>

            <section class= "change_info">
            <h4>First Name: '.$row['firstName'].'</h4> 
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "first_name"  pattern="[a-zA-Z]{1,25}" title="First names must be letters 1-25 characters in length" placeholder = "Update First Name"    style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br>
            <h4>Last Name: '.$row['lastName'].'</h4>
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "last_name" pattern="[a-zA-Z]{1,25}" title="Last names must be letters 1-25 characters in length" placeholder = "Update Last Name" style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br></section>';


        }
        
        //Displays the view for that the employee sees        
        if(isset($_SESSION['employee_user']))
        {
         $result = $conn->query("SELECT * FROM Employee WHERE username='".$username."'");

        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); 

                    } 
        echo '<h2>Logged In As: '.$username.'</h2><br><hr><br>

            <section class= "change_info">
            <h4>First Name: '.$row['fName'].'</h4> 
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "first_name" pattern="[a-zA-Z]{1,25}" title="First names must be letters 1-25 characters in length" placeholder = "Update First Name"    style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br>
            <h4>Last Name: '.$row['lName'].'</h4>
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "last_name" pattern="[a-zA-Z]{1,25}" title="Last names must be letters 1-25 characters in length" placeholder = "Update Last Name" style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br>
            <h4>Email Address: '.$row['email'].'</h4>
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "email" placeholder = "Update Email" style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br>
            </section>';


        }    
        
        //Displays what the Database Admin can see     
        if(isset($_SESSION['DB_user']))
        {
         $result = $conn->query("SELECT * FROM DB_Admin WHERE username='".$username."'");

        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); 

                    }
        echo '<h2>Logged In As: '.$username.'</h2><br><hr><br>

            <section class= "change_info">
            <h4>First Name: '.$row['fName'].'</h4> 
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "first_name" pattern="[a-zA-Z]{1,25}" title="First names must be letters 1-25 characters in length" placeholder = "Update First Name"    style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br>
            <h4>Last Name: '.$row['lName'].'</h4>
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "last_name" pattern="[a-zA-Z]{1,25}" title="Last names must be letters 1-25 characters in length" placeholder = "Update Last Name" style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br></section>';


        }        
         
                
                
                
        /*Customer's view of this page. 
        They can see their first and last name, email, billing and shipping address, and ssn. 
        */       
	else{
            if(!(isset($_SESSION['owner_user'])||isset($_SESSION['employee_user'])||isset($_SESSION['DB_user']))){	
       	    echo '<h2>Logged In As: '.$username.'</h2><br><hr><br>

            <section class= "change_info">
            <h4>First Name: '.$row['First_Name'].'</h4> 
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "first_name" pattern="[a-zA-Z]{1,25}" title="First names must be letters 1-25 characters in length" placeholder = "Update First Name"    style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br>
            <h4>Last Name: '.$row['Last_Name'].'</h4>
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "last_name" pattern="[a-zA-Z]{1,25}" title="Last names must be letters 1-25 characters in length" placeholder = "Update Last Name" style="width: 280px; height: 35px;"/> 
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br>

            <h4>Email Address: '.$row['email'].'</h4>
            <p>	
            <form action="joe_information_results.php" method="post" enctype="multipart/form-data">

            <input type= "text" name= "email" placeholder = "Update Email" style="width: 280px; height: 35px;"/>
            <button type="submit">Update</button>
            </form>
            </p><br><hr><br> </section>';
            }
            }
	    echo "<section class = 'change_info'>
            <h4>Stored Billing Addresses: </h4>";
            $result = $conn->query("SELECT * FROM b_address WHERE c_id='".$customerid."'");
            
	    //returns information for billing address	
            if ($result->num_rows > 0) {
                $result = db_result_to_array($result); 
                foreach ($result as $row) {
		            echo $row['b_fname']." ";
		            echo $row['b_lname']."<br>";
		            echo $row['b_street'];
		            echo ", ";
		            echo $row['b_city'];
		            echo ", ";
		            echo $row['b_state'];
		            echo " ";
		            echo $row['b_zip_code']; 
		
		            echo '<p>
		            <form action="joe_information_results.php?b_address_id='.$row['b_address_id'].'"  method="post" enctype="multipart/form-data">
		
		            <input type= "text" name= "b_street" pattern="[0-9A-Za-z -]{1,25}" title="Street names can only be a combination of letters and numbers" placeholder = "Update Street Address" style="width: 280px; height: 35px;"/>
		            <button type="submit">Update</button>
		            </form>
		            </p>
		
		            <p>
		            <form action="joe_information_results.php?b_address_id='.$row['b_address_id'].'" method="post" enctype="multipart/form-data">
		
		            <input type= "text" name= "b_city" pattern="[a-zA-Z]{1,25}" title="City names must be letters 1-25 characters in length" placeholder = "Update City" style="width: 280px; height: 35px;"/>
		            <button type="submit">Update</button>
		            </form>
		            </p>
		
		            <p>
		            <form action="joe_information_results.php?b_address_id='.$row['b_address_id'].'" method="post" enctype="multipart/form-data">
		
		            <select name="b_state">
		                <option disabled selected value>Select a State</option>
		            	<option>Alabama</option>
		            	<option>Alaska</option>
		            	<option>Arizona</option>
		            	<option>Arkansas</option>
		            	<option>California</option>
		            	<option>Colorado</option>
		            	<option>Connecticut</option>
		            	<option>Delaware</option>
		            	<option>Florida</option>
		            	<option>Georgia</option>
		            	<option>Hawaii</option>
		            	<option>Idaho</option>
		            	<option>Illinois</option>
		            	<option>Indiana</option>
		            	<option>Iowa</option>
		            	<option>Kansas</option>
		            	<option>Kentucky</option>
		            	<option>Louisiana</option>
		            	<option>Maine</option>
		            	<option>Maryland</option>
		            	<option>Massachusetts</option>
		            	<option>Michigan</option>
		            	<option>Minnesota</option>
		            	<option>Mississippi</option>
		            	<option>Missouri</option>
		            	<option>Montana</option>
		            	<option>Nebraska</option>
		            	<option>Nevada</option>
		            	<option>New Hampshire</option>
		            	<option>New Jersey</option>
		            	<option>New Mexico</option>
		            	<option>New York</option>
		            	<option>North Carolina</option>
		            	<option>North Dakota</option>
		            	<option>Ohio</option>
		            	<option>Oklahoma</option>
		            	<option>Oregon</option>
		            	<option>Pennsylvania</option>
		            	<option>Rhode Island</option>
		            	<option>South Carolina</option>
		            	<option>South Dakota</option>
		            	<option>Tennessee</option>
		            	<option>Texas</option>
		            	<option>Utah</option>
		            	<option>Vermont</option>
		            	<option>Virginia</option>
		            	<option>Washington</option>
		            	<option>West Virginia</option>
		            	<option>Wisconsin</option>
		            	<option>Wyoming</option>
		            </select>
		            <button type="submit">Update</button>
		            </form>
		            </p>
		
		            <p>
		            <form action="joe_information_results.php?b_address_id='.$row['b_address_id'].'" method="post" enctype="multipart/form-data">
		
		            <input type= "text" name= "b_zip_code" maxlength="5" pattern= "[0-9]{5}" title="Zip codes must be a combination of numbers of length 5" placeholder = "Update Zip Code" style="width: 280px; height: 35px;"/>
		            <button type="submit">Update</button>
		            </form>
		            </p>';
            	}

                } else {//else statement that tells the current user there is no billing address
                    echo "No saved billing addresses belonging to this account. Buy something to save one at checkout!";
                }

            echo "</section>";
            $result = $conn->query("SELECT * FROM s_address WHERE c_id='".$customerid."'");
	    
	    echo "<section class = 'change_info'> <hr><br>
            <h4>Stored Shipping Addresses: </h4>";
            
            //returns information for shipping address
            if ($result->num_rows > 0) {
                    $result = db_result_to_array($result); 
                    foreach ($result as $row) {
		            echo $row['s_fname']." ";
		            echo $row['s_lname']."<br>";
		            echo $row['s_street'];
		            echo ", ";
		            echo $row['s_city'];
		            echo ", ";
		            echo $row['s_state'];
		            echo " ";
		            echo $row['s_zip_code']; 
		            echo '<p>
		            <form action="joe_information_results.php?s_address_id='.$row['s_address_id'].'" method="post" enctype="multipart/form-data">
		
		            <input type= "text" name= "s_street" pattern="[0-9A-Za-z -]{1,25}" title="Street names can only be a combination of letters and numbers" placeholder = "Update Street Address" style="width: 280px; height: 35px;"/>
		            <button type="submit">Update</button>
		            </form>
		            </p> 
		
		            <p>
		            <form action="joe_information_results.php?s_address_id='.$row['s_address_id'].'" method="post" enctype="multipart/form-data">
		
		            <input type= "text" name= "s_city" pattern="[a-zA-Z]{1,25}" title="City names must be letters 1-25 characters in length" placeholder = "Update City" style="width: 280px; height: 35px;"/>
		            <button type="submit">Update</button>
		            </form>
		            </p> 
		
		            <p>
		            <form action="joe_information_results.php?s_address_id='.$row['s_address_id'].'" method="post" enctype="multipart/form-data">
		
		            <select name="s_state">
		                <option disabled selected value>Select a State</option>
		            	<option>Alabama</option>
		            	<option>Alaska</option>
		            	<option>Arizona</option>
		            	<option>Arkansas</option>
		            	<option>California</option>
		            	<option>Colorado</option>
		            	<option>Connecticut</option>
		            	<option>Delaware</option>
		            	<option>Florida</option>
		            	<option>Georgia</option>
		            	<option>Hawaii</option>
		            	<option>Idaho</option>
		            	<option>Illinois</option>
		            	<option>Indiana</option>
		            	<option>Iowa</option>
		            	<option>Kansas</option>
		            	<option>Kentucky</option>
		            	<option>Louisiana</option>
		            	<option>Maine</option>
		            	<option>Maryland</option>
		            	<option>Massachusetts</option>
		            	<option>Michigan</option>
		            	<option>Minnesota</option>
		            	<option>Mississippi</option>
		            	<option>Missouri</option>
		            	<option>Montana</option>
		            	<option>Nebraska</option>
		            	<option>Nevada</option>
		            	<option>New Hampshire</option>
		            	<option>New Jersey</option>
		            	<option>New Mexico</option>
		            	<option>New York</option>
		            	<option>North Carolina</option>
		            	<option>North Dakota</option>
		            	<option>Ohio</option>
		            	<option>Oklahoma</option>
		            	<option>Oregon</option>
		            	<option>Pennsylvania</option>
		            	<option>Rhode Island</option>
		            	<option>South Carolina</option>
		            	<option>South Dakota</option>
		            	<option>Tennessee</option>
		            	<option>Texas</option>
		            	<option>Utah</option>
		            	<option>Vermont</option>
		            	<option>Virginia</option>
		            	<option>Washington</option>
		            	<option>West Virginia</option>
		            	<option>Wisconsin</option>
		            	<option>Wyoming</option>
		            </select>
		            <button type="submit">Update</button>
		            </form>
		            </p>
		
		            <p>
		            <form action="joe_information_results.php?s_address_id='.$row['s_address_id'].'" method="post" enctype="multipart/form-data">
		
		            <input type= "text" name= "s_zip_code" maxlength="5" pattern= "[0-9]{5}" title="Zip codes must be a combination of numbers of length 5" placeholder = "Update Zip Code" style="width: 280px; height: 35px;"/>
		            <button type="submit">Update</button>
		            </form>
		            </p> ';
            		} 
                } else {//else statement that tells the current user there is no billing address
                    echo "No saved shipping addresses belonging this account. Buy something to save one at checkout!";
            }

            echo "</section>";
            require_once('joe_footer.php');
} else {
        header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}
?>