<?php

    include "../../php/db.php";

?>

<?php 

    if (!$_SESSION['logged_in'] || $_SESSION['role_id'] != 2) {

        if (!$_SESSION['role_id']) {
            $_SESSION['logged_in'] = null;
        }

        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = '../../login.php';
        header("Location: http://$host$uri/$extra");
        exit;
        
    } else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - CANDIDATES</title>
    <link rel="icon" href="../../static/icons/netit.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles/css/style.min.css">
</head>

<body>
    <div class="container-page">

        <!-- DOM manipulated header -->
        <header class="navbar bg-success text-light justify-content-center position-relative">

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 start-0">
                <a href="./main.php" class='profile-icon d-inline-flex align-items-center justify-content-center'>
                    <img src="../../static/icons/home.svg" alt="home" style="width: 22.5px;">
                </a>
            </div>

            CANDIDATES

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>
            
        </header>

        <!-- Div holding the changeable component -->
        <main id="main">

            <!-- PAGE CONTAINER -->
            <div class="d-flex flex-column gap-3 w-100">

                <!-- BUTTONS -->
                <div class="text-center">
                    
                    <!-- FILTER BUTTONS -->
                    <div class="d-flex justify-content-center">
    
                        <!-- FILTERS BUTTON -->
                        <div class="dropdown mx-2">
                            <button class="btn btn-outline-success" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                FILTERS
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="filterButton">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="applied">
                                    <label class="form-check-label" for="applied">
                                        APPLIED
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="interviewed">
                                    <label class="form-check-label" for="interviewed">
                                        INTERVIEWED
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="rejected">
                                    <label class="form-check-label" for="rejected">
                                        REJECTED
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hired">
                                    <label class="form-check-label" for="hired">
                                        HIRED
                                    </label>
                                </div>
                            </ul>
                        </div>
    
                        <!-- SORT BUTTON -->
                        <div class="dropdown mx-2">
                            <button class="btn btn-outline-success" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SORT
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="sortButton">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="position-az" checked>
                                    <label class="form-check-label" for="position-za">
                                        POSITION - A-Z
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="position-za">
                                    <label class="form-check-label" for="position-za">
                                        POSITION - Z-A
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="name-az">
                                    <label class="form-check-label" for="name-az">
                                        NAME - A-Z
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="name-za">
                                    <label class="form-check-label" for="name-za">
                                    NAME - Z-A
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="status-az">
                                    <label class="form-check-label" for="status-az">
                                        STATUS - A-Z
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="status-za">
                                    <label class="form-check-label" for="status-za">
                                        STATUS Z-A
                                    </label>
                                </div>
                            </ul>
                        </div>
    
                    </div>
                </div>

                <!-- MAIN CONTENT -->
                <div class="container-xl d-flex list-group-flush flex-column" id="mainContent">

                    <?php

                        $query = "SELECT candidates.*, jobs.title, employee_info.first_name, employee_info.last_name FROM candidates, jobs, employee_info WHERE candidates.employee_id = employee_info.user_id AND candidates.job_id = jobs.id ORDER BY jobs.title ASC LIMIT 5";
                        $result = mysqli_query($DB, $query);

                        if (mysqli_num_rows($result) < 1) {

                            echo '<li class="list-group-item list-group-item-action d-flex justify-content-center">NO CANDIDATES YET!</li>';

                        } else {

                            foreach ($result as $row) {
                                
                                echo    '<a href="./application.php?id='.$row['id'].'" class="list-group-item list-group-item-action d-flex align-items-center">
                                            <div class="w-100">
                                                <p class="fw-bold fs-4 mb-1">'.strtoupper($row['title']).' - '.$row['first_name'].' '.$row['last_name'].'</p>
                                                <p class="fs-5 mb-0"> STATUS: '.strtoupper($row['status']).'</p>
                                            </div>
                                            <img class="ps-3" style="width: 90px;" src="https://www.treehugger.com/thmb/aW3Ql9fQ-V1QxUSI7_5iN0o9Dlk=/750x750/smart/filters:no_upscale()/__opt__aboutcom__coeus__resources__content_migration__mnn__images__2017__05__lady-bug-on-leaf-e3cd36cdc3024129b61926ddf6ef386e.jpg" alt="companyimage">
                                        </a>';
                            }
                        }

                    ?>

                </div>

                <!-- PAGE NAVIGATION -->
                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination pagination-sm justify-content-center d-inline-flex" id="pagination">

                        <?php

                            $query = "SELECT COUNT(*) FROM candidates";
                            $result = mysqli_query($DB, $query);
                            $count = mysqli_fetch_assoc($result);
                            $count = $count['COUNT(*)'];

                            $pages = ceil($count / 5);

                            if ($pages > 1) {

                                for ($i = 0; $i < $pages; $i++) {
    
                                    $currentpage = $i + 1;

                                    if ($currentpage == 1) {

                                        echo '<li class="page-item active"><button class="page-link" value="page'.$currentpage.'">'.$currentpage.'</button></li>';

                                    } else {

                                        echo '<li class="page-item"><button class="page-link" value="page'.$currentpage.'">'.$currentpage.'</button></li>';
                                    }
                                }
                            }

                        ?>

                    </ul>
                </nav>

            </div>

        </main>

        <!-- Static Footer -->
        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Main script -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/hr/main.js"></script>
    </div>
</body>

</html>

<?php 

    }

?>