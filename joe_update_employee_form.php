<?php
    session_start();
if(isset($_SESSION['valid_user'])) {
    
    
	require_once('joe_menus.php');
	require_once('joe_db_fns.php');
   //Makes sure only owner can access this page
    if(!isset($_SESSION['owner_user'])) {

        throw new Exception('You do not have Access to this page');
    }


	
	//Allows for the row of the employee to be called based on given ID number
	$conn = db_connect();
	$result = $conn->query("SELECT * FROM Employee e JOIN employee_address s ON e.emp_id=s.e_id WHERE emp_id ='".$_POST['id_number']."'");
		
	if ($result->num_rows > 0) {
	    	$row = $result->fetch_assoc(); 
	        	 
	        	} else {
	        	echo "0 results";
			}
	

	
    ?>
    <!-- HTML form that allows for changes of the employee account, and displays current information -->
      <h2>Update employee account</h2>
      <h2>Employee ID: <?php 
  		echo $_POST['id_number'];
  		 ?></h2>
  		 <section class= "change_info">

   <h4>Job Title: <?php echo $row['title']; ?></h4>
  	<p>	
  		  <form action="joe_new_employee.php" method="post" enctype="multipart/form-data">

  		<input type= "text" name= "job_title" placeholder = "Job Title" style="width: 280px; height: 35px;"/>

  	</p>	

  <h4>First Name: <?php echo $row['fName']; ?></h4>
  	<p>	
  		 
  		<input type= "text" name= "first_name" placeholder = "First Name" style="width: 280px; height: 35px;"/>
  	</p>
 <h4>Last Name: <?php echo $row['lName']; ?></h4>

  <p>	

  		<input type= "text" name= "last_name" placeholder = "Last Name" style="width: 280px; height: 35px;"/>
  </p>
   <h4>Username: <?php echo $row['username']; ?></h4>

  <p>	
  		
  		<input type= "text" name= "username" placeholder = "Username" style="width: 280px; height: 35px;"/>
  </p>
   <h4>Password:</h4>

  <p>	
  		<input type= "text" name= "password" placeholder = "Password" style="width: 280px; height: 35px;"/>
  </p>
  <h4>Email Address: <?php echo $row['email']; ?></h4>
  	<p>	
  		
  		<input type= "text" name= "email" placeholder = "Email" style="width: 280px; height: 35px;"/>

  	</p>

  

  <h4>Employee Address</h4>
    <?php echo $row['e_street'];
  	echo ", ";
  	echo $row['e_city'];
  	echo ", ";
  	echo $row['e_state'];
  	echo " ";
  	echo $row['e_zipcode']; 
  	?></h4>
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
    <h4>Social Security Number: </h4>
  	<p>	

  		<input type= "text" name= "ssn" placeholder = Social Security Number style="width: 280px; height: 35px;"/>
  		


  		<form> 
  	</p>
 <button type="submit">Update</button> 
</section>  
    
<?php
    require_once('joe_footer.php');
    } else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}  
?>
