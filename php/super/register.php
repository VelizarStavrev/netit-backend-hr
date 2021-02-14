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
    if(isset($_POST['username']) && isset($_POST['password'])) {

        // table - users
        $email = escape($_POST['email']);
        $username = escape($_POST['username']);
        $password = escape($_POST['password']);
        $role = 2; // hr

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

            // Check if email exists
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($DB, $query);

            if (mysqli_num_rows($result) >= 1) {

                // TO DO - FIX THIS TO LOOK BETTER WHEN IT OCCURS
                exit("Email already exists!");
            }

            // Check if user exists
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($DB, $query);

            if (mysqli_num_rows($result) >= 1) {

                // TO DO - FIX THIS TO LOOK BETTER WHEN IT OCCURS
                exit("User already exists!");
            }

            // Save timestamp
            $date = new DateTime();
            $joined = $date->getTimestamp();

            // Hash password
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
            
            // Create new user in table users
            $query = "INSERT INTO users (username, email, password, role, joined) VALUE ('$username', '$email', '$password', '$role', '$joined')";
            $result = mysqli_query($DB, $query);

            // Get new user id
            $query = "SELECT id FROM users WHERE email = '$email'";
            $result = mysqli_query($DB, $query);
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];

            // Set new user info into table hr_info
            $query = "INSERT INTO employee_info (user_id, first_name, last_name, country, city, p_email, p_phone, p_site, p_linkedin) VALUE ('$id', '$firstName', '$lastName', '$country', '$city', '$emailPublic', '$phonePublic', '$website', '$linkedin')";
            // $query = "INSERT INTO hr_info (user_id, first_name, last_name, country, city, p_email, p_phone, p_site, p_linkedin) VALUE ('$id', '$firstName', '$lastName', '$country', '$city', '$emailPublic', '$phonePublic', '$website', '$linkedin')";
            $result = mysqli_query($DB, $query);
        }
    } 

?>