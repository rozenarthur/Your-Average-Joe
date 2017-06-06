<?php
    /*
        Container for functions that check the validity of data.
    */

    //function to check if a field has been filled out.
    function filled_out($form_vars) {
    //test that each variable has a value

        foreach($form_vars as $key => $value) {
            if((!isset($key)) || ($value == '')) {
            return false;
            }
        }

        return true;
    }
    
    //function to check if an email address is in a valid form
    function valid_email($address) {
        //check if an email address is possibly valid
        if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address)) {
            return true;
        } else {
            return false;
        }
    }
?>
