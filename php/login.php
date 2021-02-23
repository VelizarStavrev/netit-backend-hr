<?php

    // FUNCTIONS
    // Edit data function
    function escape($data) {
        global $DB;
        $data = trim($data);
        $data = mysqli_real_escape_string($DB, $data);
        return $data;
    }

    if(isset($_POST['username']) && isset($_POST['password'])) {
        if(!empty($_POST['username']) && !empty($_POST['password'])) {

            // Check DB connection
            if(!$DB) { 
                die("Connection to DB failed: ".mysqli_connect_error());
            } else {

                // Get form data
                $username = escape($_POST['username']);
                $password = escape($_POST['password']);
                
                // Check if user exists
                $query = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($DB, $query);

                if (mysqli_num_rows($result) == 1) {

                    // Compare passwords
                    $row = mysqli_fetch_assoc($result);
                    $verifyPassword = password_verify($password, $row['password']);

                    if ($verifyPassword) {

                        $_SESSION['logged_in'] = true;
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['role_id'] = $row['role'];

                        /* Redirect to the corresponding page depending on the user */
                        switch ($_SESSION['role_id']) {

                            case 1: // super

                                $host  = $_SERVER['HTTP_HOST'];
                                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                                $extra = 'super/main.php';
                                header("Location: http://$host$uri/$extra");
                                break;

                            case 2: // hr

                                $host  = $_SERVER['HTTP_HOST'];
                                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                                $extra = 'hr/main.php';
                                header("Location: http://$host$uri/$extra");
                                break;

                            case 3: // employer

                                $host  = $_SERVER['HTTP_HOST'];
                                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                                $extra = 'employer/main.php';
                                header("Location: http://$host$uri/$extra");
                                break;

                            case 4: // employee

                                $host  = $_SERVER['HTTP_HOST'];
                                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                                $extra = 'employee/main.php';
                                header("Location: http://$host$uri/$extra");
                                break;
                        }

                        // Do not execute any other code
                        exit;

                    } else {
                        echo 'Passwords do not match - do not login user!';
                    }
                } else {
                    echo 'User does not exist';
                }
            }
        }
    }

?>