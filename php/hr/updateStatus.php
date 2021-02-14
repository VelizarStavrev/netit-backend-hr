<?php

    include "../db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Get values
        $value = file_get_contents('php://input');
        $decodedvalue = json_decode($value);

        $status = $decodedvalue[0];
        $jobid = $decodedvalue[1];

        $query = "UPDATE candidates SET status = '$status' WHERE id = $jobid";
        $result = mysqli_query($DB, $query);

        // Send response to front end
        $dbresponse = json_encode($decodedvalue);
        echo $dbresponse;
    }

?>