<?php

    // FUNCTIONS
    // Edit data function
    function escape($data) {
        global $DB;
        $data = trim($data);
        $data = mysqli_real_escape_string($DB, $data);
        return $data;
    }

    // Get data and create user
    if(isset($_POST['receiver']) && isset($_POST['message'])) {

        // Check DB connection
        if(!$DB) { 
            die("Connection to DB failed: ".mysqli_connect_error());
        } else {

            $currentuser = $_SESSION['username'];

            $receiver = escape($_POST['receiver']);
            $topic = escape($_POST['topic']);
            $message = escape($_POST['message']);

            // Save timestamp
            $date = new DateTime();
            $created = $date->getTimestamp();

            $query = "INSERT INTO messages (sender, receiver, topic, message, sent) VALUE ('$currentuser', '$receiver', '$topic', '$message', '$created')";
            $result = mysqli_query($DB, $query);

        }
    } 

?>