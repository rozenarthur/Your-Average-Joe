<?php 
	
	//HTML form that allows the Owner to update an employee's information

    if(isset($_SESSION['valid_user'])) {
?>
<section class= "change_info">

    <h4>Job Title</h4>
  	<p>	
  		  <form action="joe_new_employee.php" method="post" enctype="multipart/form-data">

  		<input type= "text" name= "job_title" pattern="[a-zA-Z]{1,25}" title="Job titles must be letters 1-25 characters in length" placeholder = "Job Title" style="width: 280px; height: 35px;"/>

  	</p>	

  <h4>First Name</h4>
  	<p>	
  		 
  		<input type= "text" name= "first_name" pattern="[a-zA-Z]{1,25}" title="First names must be letters 1-25 characters in length" placeholder = "First Name" style="width: 280px; height: 35px;"/>
  	</p>
 <h4>Last Name</h4>

  <p>	

  		<input type= "text" name= "last_name" pattern="[a-zA-Z]{1,25}" title="Last names must be letters 1-25 characters in length" placeholder = "Last Name" style="width: 280px; height: 35px;"/>
  </p>
   <h4>Username</h4>

  <p>	
  		
  		<input type= "text" name= "username" pattern="[a-zA-Z0-9_]{6,25}" title="Usernames can only consist of letters and numbers and must be 6-25 characters in length" placeholder = "Username" style="width: 280px; height: 35px;"/>
  </p>
   <h4>Password</h4>

  <p>	
  		<input type= "text" name= "password" pattern="[a-zA-Z0-9]{6,16}" title="Passwords can only consist of letters and numbers and must be 6-16 characters in length" placeholder = "Password" style="width: 280px; height: 35px;"/>
  </p>
  <h4>Email Address</h4>
  	<p>	
  		
  		<input type= "text" name= "email" placeholder = "Email" style="width: 280px; height: 35px;"/>

  	</p>

  

  <h4>Employee Address</h4>
  <p>
  	<input type= "text" name= "e_street" placeholder = "Address" style="width: 280px; height: 35px;"/>
  </p>

    <p>
  	<input type= "text" name= "e_city" placeholder = "City" style="width: 280px; height: 35px;"/>

  </p>

    <p>
  	<input type= "text" name= "e_state" placeholder = State style="width: 280px; height: 35px;"/>

  </p>

    <p>
  	<input type= "text" name= "e_zip_code" placeholder = Zip Code style="width: 280px; height: 35px;"/>
  	
  </p>
    <h4>Social Security Number</h4>
  	<p>	

  		<input type= "text" name= "ssn" placeholder = Social Security Number style="width: 280px; height: 35px;"/>
  		


  		<form> 
  	</p>
 <button type="submit">Create</button> 
</section>  

<?php
    } else {
        header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
    }
?>
    