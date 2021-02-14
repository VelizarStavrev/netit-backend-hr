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
        $filter = '(role = 2 OR role = 4)';
        $sort = '';

        // Check filters
        if (in_array('employee', $filterValues) == false || in_array('hr', $filterValues) == false) { // if one of the both is not set, check which to set

            if (in_array('employee', $filterValues) == true) {

                $filter = " role = 4";
            }
    
            if (in_array('hr', $filterValues) == true) {
    
                $filter = " role = 2";
            }
        }
        
        // Sort filters
        switch ($sortValues) {

            case 'username-az':

                $sort = " ORDER BY username ASC";
                break;
            
            case 'username-za':

                $sort = " ORDER BY username DESC";
                break;

            case 'role-az':

                $sort = " ORDER BY role DESC";
                break;
            
            case 'role-za':

                $sort = " ORDER BY role ASC";
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
        $mainquery = "SELECT * FROM users WHERE";
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