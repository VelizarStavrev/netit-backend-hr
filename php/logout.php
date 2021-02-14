<?php

    if(isset($_POST['logout'])) {

        $_SESSION['logged_in'] = null;
        $_SESSION['username'] = null;
        $_SESSION['role_id'] = null;
        
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = '../../index.php';
        header("Location: http://$host$uri/$extra");
    }

?>