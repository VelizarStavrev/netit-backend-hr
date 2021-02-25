<?php

    session_start();

    include "auth/paths.php";

    // Check if user is logged in
    if(!$_SESSION['logged_in']) {

        $_SESSION['logged_in'] = null;

        /* Redirect to login page */
        $extra = 'pages/login.php';
        
    } else {
        
        /* Redirect to the corresponding page depending on the user */
        switch ($_SESSION['role_id']) {
            case 1: // super

                $extra = 'pages/super/main.php';
                break;

            case 2: // hr

                $extra = 'pages/hr/main.php';
                break;

            case 3: // employer

                $extra = 'pages/employer/main.php';
                break;

            case 4: // employee

                $extra = 'pages/employee/main.php';
                break;
        }
    }

    header("Location: $protocol://$host/$uri/$extra");

    // Do not execute any other code
    exit;