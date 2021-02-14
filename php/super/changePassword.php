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
    if(isset($_POST['username']) && isset($_POST['newpassword'])) {

        // Check DB connection
        if(!$DB) { 
            die("Connection to DB failed: ".mysqli_connect_error());
        } else {

            $username = escape($_POST['username']);
            $newpassword = escape($_POST['newpassword']);
            $newhashedpassword = password_hash($newpassword, PASSWORD_BCRYPT, array('cost' => 10));

            $query = "UPDATE users SET password = '$newhashedpassword' WHERE username = '$username'";
            $result = mysqli_query($DB, $query);

            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = './changepassword.php';
            header("Location: http://$host$uri/$extra");
        }
    } 

?>