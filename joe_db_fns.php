<?php
        
    /*
        Container for functions that interact with the database.
    */
    
    //Function used to connect to the database.
    function db_connect() {
        $result = new mysqli('localhost', 'wieseld', 'hetfield1994', 'wieseld_Your_Average_Joe');
        
        if(!$result) {
            throw new Exception('Could not connect to database server');
        } else {
            //sets autocommit to true
           $result->autocommit(TRUE);
            return $result;
        }
    }
    
    /*
        Takes a MySQL result identifier and turns into an array of rows. Each row in the array is an associative array.
    */

    function db_result_to_array($result) {
        $res_array = array();
        
        for ($count=0; $row = $result->fetch_assoc(); $count++) {
            $res_array[$count] = $row;
        }
        
        return $res_array;
    }
    
    
?>