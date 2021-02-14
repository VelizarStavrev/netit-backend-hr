<?php

    include "../db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $value = file_get_contents('php://input');
        $decodedvalue = json_decode($value);
        $userid = $_SESSION['user_id'];
        
        $jobid = $decodedvalue[0];
        $pageNumberString = $decodedvalue[1];
        $pageNumber = substr($pageNumberString, 4);

        // Limit - 5 items per page
        $limitNumber = 5;
        $limit = ' LIMIT '.$limitNumber;

        $offsetNumber = ($pageNumber - 1) * $limitNumber;
        $offset = ' OFFSET '.$offsetNumber;

        // The query has a main string a limit with offset
        $mainquery = "SELECT candidates.*, jobs.title FROM candidates, jobs WHERE candidates.employee_id = $userid AND candidates.job_id = jobs.id ORDER BY jobs.title ASC";
        $query = $mainquery.$limit.$offset;
        $result = mysqli_query($DB, $query);

        if (mysqli_num_rows($result) > 0) {

            $candidateArray = [];

            foreach ($result as $row) {
                   
                array_push($candidateArray, $row);
            }

            // Pagination info
            $query = $mainquery;
            $result = mysqli_query($DB, $query);
            array_push($candidateArray, mysqli_num_rows($result));

            // Send response to front end
            $dbresponse = json_encode($candidateArray);
            echo $dbresponse;

        } else {

            // TO DO
            // FIX RESPONSE WHEN NO ROWS
            $resulttest = $query;
            $dbresponse = json_encode($resulttest);
            echo $dbresponse;
        }
    }

?>