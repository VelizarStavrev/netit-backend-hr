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

        $roles = $_POST['roles'];

        if ($roles == 'employee') {

            // table - users
            $email = escape($_POST['email']);
            $username = escape($_POST['username']);
            $password = escape($_POST['password']);
            $role = 4; // employee

            // table - employee info
            $firstName = escape($_POST['firstName']);
            $lastName = escape($_POST['lastName']);
            $country = escape($_POST['country']);
            $city = escape($_POST['city']);
            $emailPublic = escape($_POST['emailPublic']);
            $phonePublic = escape($_POST['phonePublic']);
            $website = escape($_POST['website']);
            $linkedin = escape($_POST['linkedin']);

        } else { // employer

            // table - users
            $email = escape($_POST['email']);
            $username = escape($_POST['username']);
            $password = escape($_POST['password']);
            $role = 3; // employer

            // table - employer info
            $companyName = escape($_POST['companyName']);
            $industry = escape($_POST['industry']);
            $country = escape($_POST['country']);
            $city = escape($_POST['city']);
            $description = escape($_POST['description']);
            $website = escape($_POST['website']);
            $linkedin = escape($_POST['linkedin']);

        }

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

            // Set new user info into table employee_info
            if ($role == 4) {

                $query = "INSERT INTO employee_info (user_id, first_name, last_name, country, city, p_email, p_phone, p_site, p_linkedin) VALUE ('$id', '$firstName', '$lastName', '$country', '$city', '$emailPublic', '$phonePublic', '$website', '$linkedin')";
                $result = mysqli_query($DB, $query);

            } else if ($role == 3) { // Set new user info into table employer_info

                $query = "INSERT INTO employer_info (user_id, company_name, industry, country, city, company_description, p_site, p_linkedin) VALUE ('$id', '$companyName', '$industry', '$country', '$city', '$description', '$website', '$linkedin')";
                $result = mysqli_query($DB, $query);
            }

            // Save data and login
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $id;
            $_SESSION['role_id'] = $role;

            /* Redirect to the corresponding page depending on the user */
            switch ($_SESSION['role_id']) {

                case 1: // super

                    $host  = $_SERVER['HTTP_HOST'];
                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    $extra = './super/main.php';
                    header("Location: http://$host$uri/$extra");
                    break;

                case 2: // hr

                    $host  = $_SERVER['HTTP_HOST'];
                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    $extra = './hr/main.php';
                    header("Location: http://$host$uri/$extra");
                    break;

                case 3: // employer

                    $host  = $_SERVER['HTTP_HOST'];
                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    $extra = './employer/main.php';
                    header("Location: http://$host$uri/$extra");
                    break;

                case 4: // employee

                    $host  = $_SERVER['HTTP_HOST'];
                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    $extra = './employee/main.php';
                    header("Location: http://$host$uri/$extra");
                    break;
            }

            // Do not execute any other code
            exit;
        }
    } 

?>