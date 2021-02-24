<?php

    include "paths.php";

    if ($_SESSION['logged_in']) {

        if ($_SESSION['role_id'] == 1) {

            $extra = 'pages/super/main.php';

        } else if ($_SESSION['role_id'] == 2) {

            $extra = 'pages/hr/main.php';

        } else if ($_SESSION['role_id'] == 3) {

            $extra = 'pages/employer/main.php';

        } else if ($_SESSION['role_id'] == 4) {

            $extra = 'pages/employee/main.php';
        }

        // $extra = 'pages/login.php';
        header("Location: $protocol://$host/$uri/$extra");
        exit;
    }