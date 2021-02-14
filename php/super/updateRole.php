<?php

    include "../db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Get values
        $value = file_get_contents('php://input');
        $decodedvalue = json_decode($value);

        $role = $decodedvalue[0];
        $userid = $decodedvalue[1];

        if ($role == 'hr') {

            $role = 2;

        } else { // employee

            $role = 4;
        }

        $query = "UPDATE users SET role = '$role' WHERE id = $userid";
        $result = mysqli_query($DB, $query);

        // Send response to front end
        $dbresponse = json_encode($decodedvalue);
        echo $dbresponse;
    }

?>