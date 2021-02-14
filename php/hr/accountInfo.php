<?php

    // FUNCTIONS
    // Edit data function
    function escape($data) {
        global $DB;
        $data = trim($data);
        $data = mysqli_real_escape_string($DB, $data);
        return $data;
    }

    // Get data and create user
    if(isset($_POST['emailPublic'])) {
        
        // Get user id
        $userid = $_SESSION['user_id'];

        // table - users
        $password = escape($_POST['password']);

        // table - employee_info
        $firstName = escape($_POST['firstName']);
        $lastName = escape($_POST['lastName']);
        $country = escape($_POST['country']);
        $city = escape($_POST['city']);
        $emailPublic = escape($_POST['emailPublic']);
        $phonePublic = escape($_POST['phonePublic']);
        $website = escape($_POST['website']);
        $linkedin = escape($_POST['linkedin']);

        // Check DB connection
        if(!$DB) { 
            die("Connection to DB failed: ".mysqli_connect_error());
        } else {

            // Set new password if there is such
            if ($password != "newpassword") {

                // Hash password
                $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
                
                // Update password
                $query = "UPDATE users SET password = '$password' WHERE id = $userid";
                $result = mysqli_query($DB, $query);
            }

            // Set new user info into table hr_info
            $query = "UPDATE employee_info SET first_name = '$firstName', last_name = '$lastName', country = '$country', city = '$city', p_email = '$emailPublic', p_phone = '$phonePublic', p_site = '$website', p_linkedin = '$linkedin' WHERE user_id = $userid";
            $result = mysqli_query($DB, $query);
        }
    } 

?>