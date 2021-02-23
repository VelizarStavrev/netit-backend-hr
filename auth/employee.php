<?php

    if (!$_SESSION['logged_in'] || $_SESSION['role_id'] != 4) {

        if (!$_SESSION['role_id']) {
            $_SESSION['logged_in'] = null;
        }

        $protocol=$_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
        $host  = $_SERVER['HTTP_HOST'];
        $fulladress = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $mainsite = explode('/', $fulladress);
        $uri = $mainsite[1];
        $extra = 'pages/login.php';
        header("Location: $protocol://$host/$uri/$extra");
        exit;
    }