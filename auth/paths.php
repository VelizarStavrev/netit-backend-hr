<?php 

    $protocol=$_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
    $host  = $_SERVER['HTTP_HOST'];
    $fulladress = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $mainsite = explode('/', $fulladress);
    // $uri = $mainsite[1];
    // $extra = 'pages/login.php';
    // header("Location: $protocol://$host/$uri/$extra"); => http://localhost/netit-backend-hr/_x.php