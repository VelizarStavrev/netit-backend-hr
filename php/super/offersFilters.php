<?php

    include "../db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Get values
        $value = file_get_contents('php://input');
        $decodedvalue = json_decode($value);
        $userid = $_SESSION['user_id'];

        // Split decoded values
        $filterValues = $decodedvalue[0];
        $sortValues = $decodedvalue[1];
        $pageValues = $decodedvalue[2];

        // Prepare new variables
        $filter = '';
        $sort = '';

        // Check filters
        if (in_array('isremote', $filterValues) == false || in_array('notremote', $filterValues) == false) { // if one of the both is not set, check which to set

            if (in_array('isremote', $filterValues) == true) {

                $filter .= " AND jobs.location = 'Remote'";
            }
    
            if (in_array('notremote', $filterValues) == true) {
    
                $filter .= " AND jobs.location = 'Office'";
            }
        }
        
        if (in_array('haspay', $filterValues) == true) {
            
            $filter .= " AND jobs.salary > 0";
        }

        if (in_array('isopen', $filterValues) == false || in_array('isclosed', $filterValues) == false) { // if one of the both is not set, check which to set

            if (in_array('isopen', $filterValues) == true) {

                $filter .= " AND jobs.job_status = 'open'";
            }
    
            if (in_array('isclosed', $filterValues) == true) {
    
                $filter .= " AND jobs.job_status = 'closed'";
            }
        }

        // Sort filters
        switch ($sortValues) {

            case 'position-az':

                $sort = " ORDER BY jobs.title ASC";
                break;
            
            case 'position-za':

                $sort = " ORDER BY jobs.title DESC";
                break;

            case 'city-az':

                $sort = " ORDER BY employer_info.city ASC";
                break;
            
            case 'city-za':

                $sort = " ORDER BY employer_info.city DESC";
                break;

            case 'pay-high':

                $sort = " ORDER BY jobs.salary * 1 DESC";
                break;
            
            case 'pay-low':

                $sort = " ORDER BY jobs.salary * 1 ASC";
                break;

        }

        // Limit - 5 items per page
        $limitNumber = 5;
        $limit = ' LIMIT '.$limitNumber;

        // Get page number from post string
        $pagePos = strpos($value, 'page');
        $pageNumber = substr($value, $pagePos+4);
        $pageNumber = trim($pageNumber, '\"]');

        $offsetNumber = ($pageNumber - 1) * $limitNumber;
        $offset = ' OFFSET '.$offsetNumber;

        // the query has a main string, a filter, a sort and a limit with offset
        $mainquery = "SELECT jobs.*, employer_info.country, employer_info.city FROM jobs, employer_info WHERE jobs.creator = employer_info.user_id";
        $query = $mainquery.$filter.$sort.$limit.$offset;
        $result = mysqli_query($DB, $query);

        if (mysqli_num_rows($result) > 0) {

            $jobArray = [];

            foreach ($result as $row) {
                   
                array_push($jobArray, $row);
            }

            // Pagination info
            $query = $mainquery.$filter.$sort;
            $result = mysqli_query($DB, $query);
            array_push($jobArray, mysqli_num_rows($result));

            // Send response to front end
            $dbresponse = json_encode($jobArray);
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