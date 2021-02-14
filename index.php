<?php

    session_start();

    // Check if user is logged in
    if(!$_SESSION['logged_in']) {

        $_SESSION['logged_in'] = null;

        /* Redirect to a different page */
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = './pages/login.php';
        header("Location: http://$host$uri/$extra");
        
    } else {
        
        /* Redirect to the corresponding page depending on the user */
        switch ($_SESSION['role_id']) {

            case 1: // super

                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = './pages/super/main.php';
                header("Location: http://$host$uri/$extra");
                break;

            case 2: // hr

                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = './pages/hr/main.php';
                header("Location: http://$host$uri/$extra");
                break;

            case 3: // employer

                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = './pages/employer/main.php';
                header("Location: http://$host$uri/$extra");
                break;

            case 4: // employee

                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = './pages/employee/main.php';
                header("Location: http://$host$uri/$extra");
                break;
        }
    }

    // Do not execute any other code
    exit;

?>