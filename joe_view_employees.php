<?php
    
session_start();
if(isset($_SESSION['valid_user'])) {

    //check to see if user is not a customer
    if(isset($_SESSION['owner_user'])) {
    
        require_once('joe_average_fns.php');
        require_once('joe_menus.php');
        
        echo "<h4>View Employees</h4>";
        
        $conn = db_connect();
        
        $query = "SELECT * FROM Employee e, employee_address a WHERE e.emp_id = a.e_id";
        
        $result = $conn->query($query);
        
        
        foreach($result as $row) {
        
            echo '<h4>Employee ID#'.$row['emp_id'].'</h4>
                    <p>Name: '.$row['fName'].' '.$row['lName'].'<br>
                    Title: '.$row['title'].'<br>
                    Email: '.$row['email'].'<br>
                    Address: '.$row['e_street'].' '.$row['e_city'].' '.$row['e_state'].' '.$row['e_zipcode'].'
                    </p> <br><hr><br>'
                    ;
       }
        
        
        
        
    
    } else {
        
        echo "<p>You are not allowed to view this page.</p>";
    }

} else {
    header('refresh: 5; url=index.php');
    echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
     
}

?>