<?php

    // Start a session
    session_start();

    // Connect to the DB
    $serverName = "localhost";
    $serverUsername = "veliycjl_vs";
    $serverPassword = "dbvspass44";
    $serverDB = "veliycjl_netit-backend-hr";

    $DB = mysqli_connect($serverName, $serverUsername, $serverPassword, $serverDB);

?>