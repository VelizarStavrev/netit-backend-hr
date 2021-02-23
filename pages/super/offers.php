<?php

    include "../../php/db.php";

    include "../../auth/super.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - JOB LISTINGS</title>
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

            JOB LISTINGS

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
                <div class="text-center position-relative">

                    <a href="./main.php" class="p-2 position-absolute end-0 btn btn-outline-success rounded-circle me-4">
                        <img src="../../static/icons/back.svg" style="width: 25px;" alt="back">
                    </a>

                    <!-- FILTER BUTTONS -->
                    <div class="d-flex justify-content-center">
    
                        <!-- FILTERS BUTTON -->
                        <div class="dropdown mx-2">
                            <button class="btn btn-outline-success" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                FILTERS
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="filterButton">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="isremote">
                                    <label class="form-check-label" for="isremote">
                                        IS REMOTE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="notremote">
                                    <label class="form-check-label" for="notremote">
                                        NOT REMOTE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="haspay">
                                    <label class="form-check-label" for="haspay">
                                        HAS PAY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="isopen">
                                    <label class="form-check-label" for="isopen">
                                        IS OPEN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="isclosed">
                                    <label class="form-check-label" for="isclosed">
                                        IS CLOSED
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
                                    <input class="form-check-input" type="radio" name="sortfilter" value="city-az">
                                    <label class="form-check-label" for="city-az">
                                        CITY - A-Z
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="city-za">
                                    <label class="form-check-label" for="city-za">
                                        CITY - Z-A
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="pay-high">
                                    <label class="form-check-label" for="pay-high">
                                        PAY - HIGHEST
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="pay-low">
                                    <label class="form-check-label" for="pay-low">
                                        PAY - LOWEST
                                    </label>
                                </div>
                            </ul>
                        </div>
    
                    </div>
                    
                </div>

                <!-- MAIN CONTENT -->
                <div class="container-xl d-flex list-group-flush flex-column" id="mainContent">

                    <?php

                        // $userid = $_SESSION['user_id'];
                        $query = "SELECT jobs.*, employer_info.country, employer_info.city FROM jobs, employer_info WHERE jobs.creator = employer_info.user_id ORDER BY jobs.title ASC LIMIT 5";
                        $result = mysqli_query($DB, $query);

                        if (mysqli_num_rows($result) < 1) {

                            echo '<li class="list-group-item list-group-item-action d-flex justify-content-center">NO JOB OFFERS YET!</li>';

                        } else {

                            foreach ($result as $row) {
                                
                                echo    '<a href="./job.php?id='.$row['id'].'" class="list-group-item list-group-item-action d-flex align-items-center">
                                            <div class="w-100">
                                                <p class="fw-bold fs-4 mb-1">'.$row['title'].'</p>
                                                <p class="fs-5 mb-0">'."Status: ".strtoupper($row['job_status']).' </p>
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

                            $query = "SELECT COUNT(*) FROM jobs";
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
        <script src="../../scripts/super/offers.js"></script>
    </div>
</body>

</html>