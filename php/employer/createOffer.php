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
    if(isset($_POST['jobtitle']) && isset($_POST['jobdescription'])) {

        // Check DB connection
        if(!$DB) { 
            die("Connection to DB failed: ".mysqli_connect_error());
        } else {

            $jobtitle = escape($_POST['jobtitle']); // text
            $joblocation = escape($_POST['joblocation']); // office || remote
            $jobsalary = escape($_POST['jobsalary']); // number
            $jobdescription = escape($_POST['jobdescription']); // long text
            $creator = $_SESSION['user_id'];
            $status = 'open';

            // Save timestamp
            $date = new DateTime();
            $created = $date->getTimestamp();

            $query = "INSERT INTO jobs (title, creator, location, salary, description, job_status, created) VALUE ('$jobtitle', '$creator', '$joblocation', '$jobsalary', '$jobdescription', '$status', '$created')";
            $result = mysqli_query($DB, $query);

        }
    } 

?>