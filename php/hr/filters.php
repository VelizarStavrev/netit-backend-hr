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
        $keyword = 'AND (';

        if (in_array('applied', $filterValues) == true) {

            $filter .= " $keyword candidates.status = 'applied'";
            $keyword = 'OR';
        }

        if (in_array('interviewed', $filterValues) == true) {

            $filter .= " $keyword candidates.status = 'interviewed'";
            $keyword = 'OR';
        }
        
        if (in_array('rejected', $filterValues) == true) {

            $filter .= " $keyword candidates.status = 'rejected'";
            $keyword = 'OR';
        }

        if (in_array('hired', $filterValues) == true) {

            $filter .= " $keyword candidates.status = 'hired'";
            $keyword = 'OR'; // required for the following if statement
        }

        if ($keyword == 'OR') {

            $filter .= ')';
        }

        // Sort filters
        switch ($sortValues) {

            case 'position-az':

                $sort = " ORDER BY jobs.title ASC";
                break;
            
            case 'position-za':

                $sort = " ORDER BY jobs.title DESC";
                break;

            case 'name-az':

                $sort = " ORDER BY employee_info.first_name ASC";
                break;
            
            case 'name-za':

                $sort = " ORDER BY employee_info.first_name DESC";
                break;

            case 'status-az':

                $sort = " ORDER BY candidates.status ASC";
                break;
            
            case 'status-za':

                $sort = " ORDER BY candidates.status DESC";
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
        $mainquery = "SELECT candidates.*, jobs.title, employee_info.first_name, employee_info.last_name FROM candidates, jobs, employee_info WHERE candidates.employee_id = employee_info.user_id AND candidates.job_id = jobs.id";
        $query = $mainquery.$filter.$sort.$limit.$offset;
        $result = mysqli_query($DB, $query);

        if (mysqli_num_rows($result) > 0) {

            $candidateArray = [];

            foreach ($result as $row) {
                   
                array_push($candidateArray, $row);
            }

            // Pagination info
            $query = $mainquery.$filter.$sort;
            $result = mysqli_query($DB, $query);
            array_push($candidateArray, mysqli_num_rows($result));

            // Send response to front end
            $dbresponse = json_encode($candidateArray);
            echo $dbresponse;

        } else {

            $result = ['NO CANDIDATES FOUND!', 0];
            $dbresponse = json_encode($result);
            echo $dbresponse;
        }
    }

?>