<?php

    include "paths.php";

    if (!$_SESSION['logged_in'] || $_SESSION['role_id'] != 1) {

        if (!$_SESSION['role_id']) {
            $_SESSION['logged_in'] = null;
        }
        
        $extra = 'pages/login.php';
        header("Location: $protocol://$host/$uri/$extra");
        exit;
    }