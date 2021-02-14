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
            $currentjobid = substr($_SERVER['QUERY_STRING'], 3);

            $query = "UPDATE jobs SET title = '$jobtitle', location = '$joblocation', salary = '$jobsalary', description = '$jobdescription' WHERE id = $currentjobid";
            $result = mysqli_query($DB, $query);

            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = './job.php?id='.$currentjobid;
            header("Location: http://$host$uri/$extra");

        }
    } 

?>