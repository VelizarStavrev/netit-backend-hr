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
    if(isset($_POST['password'])) {
        
        // Get user id
        $userid = $_SESSION['user_id'];

        // table - users
        $password = escape($_POST['password']);

        // table - employee_info
        $industry = escape($_POST['industry']);
        $country = escape($_POST['country']);
        $city = escape($_POST['city']);
        $description = escape($_POST['description']);
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
            $query = "UPDATE employer_info SET industry = '$industry', country = '$country', city = '$city', company_description = '$description', p_site = '$website', p_linkedin = '$linkedin' WHERE user_id = $userid";
            $result = mysqli_query($DB, $query);
        }
    } 

?>