<?php

    if ($_SESSION['logged_in']) {

        if ($_SESSION['role_id'] == 1) {

            $extra = './super/main.php';

        } else if ($_SESSION['role_id'] == 2) {

            $extra = './hr/main.php';

        } else if ($_SESSION['role_id'] == 3) {

            $extra = './employer/main.php';

        } else if ($_SESSION['role_id'] == 4) {

            $extra = './employee/main.php';
        }

        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri/$extra");
        exit;
    }