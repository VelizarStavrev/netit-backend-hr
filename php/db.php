<?php

    // Start a session
    session_start();

    // Connect to the DB
    $serverName = "localhost";
    $serverUsername = "root";
    $serverPassword = "";
    $serverDB = "netit-backend-hr";

    $DB = mysqli_connect($serverName, $serverUsername, $serverPassword, $serverDB);

?>