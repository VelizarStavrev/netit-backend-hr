<?php

    include "../../php/db.php";

    include "../../auth/employee.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - APPLICATIONS</title>
    <link rel="icon" href="../../static/icons/netit.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles/css/style.min.css">
</head>

<body>
    <div class="container-page">

        <header class="navbar bg-success text-light justify-content-center position-relative">

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 start-0">
                <a href="./main.php" class='profile-icon d-inline-flex align-items-center justify-content-center'>
                    <img src="../../static/icons/home.svg" alt="home" style="width: 22.5px;">
                </a>
            </div>

            APPLICATIONS

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>
            
        </header>

        <main id="main">

            <!-- Page Container -->
            <div class="d-flex flex-column gap-3 w-100">

                <div class="profileSettings list-group-flush" id="mainContent">

                    <div class="sectionDescription navbar text-dark justify-content-center position-relative">
                        <p class="sectionHeader ">YOUR APPLICATIONS</p>
                        <a href="./profile.php" class="p-2 position-absolute end-0 btn btn-outline-success rounded-circle">
                            <img src="../../static/icons/back.svg" alt="profile">
                        </a>
                    </div>

                    <hr>
        
                    <?php

                        $userid = $_SESSION['user_id'];
                        $query = "SELECT candidates.*, jobs.title FROM candidates, jobs WHERE candidates.employee_id = $userid AND candidates.job_id = jobs.id ORDER BY jobs.title ASC LIMIT 5";
                        $result = mysqli_query($DB, $query);

                        if (mysqli_num_rows($result) < 1) {

                            echo '<li class="list-group-item list-group-item-action d-flex justify-content-center">NO CANDIDATES YET!</li>';

                        } else {

                            foreach ($result as $row) {
                                
                                echo    '<li class="list-group-item list-group-item-action d-flex align-items-center">
                                            <div class="w-100">
                                                <p class="fw-bold fs-4 mb-1">'.strtoupper($row['title']).'</p>
                                                <p class="fs-5 mb-0">STATUS: '.strtoupper($row['status']).'</p>
                                            </div>
                                            <img class="ps-3" style="width: 90px;" src="https://www.treehugger.com/thmb/aW3Ql9fQ-V1QxUSI7_5iN0o9Dlk=/750x750/smart/filters:no_upscale()/__opt__aboutcom__coeus__resources__content_migration__mnn__images__2017__05__lady-bug-on-leaf-e3cd36cdc3024129b61926ddf6ef386e.jpg" alt="tempimage">
                                        </li>';
                            }
                        }

                    ?>

                </div>

                <!-- Page Navigation -->
                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination pagination-sm justify-content-center d-inline-flex" id="pagination">

                        <?php

                            $query = "SELECT COUNT(*) FROM candidates WHERE candidates.employee_id = $userid";
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

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/employee/applications.js"></script>
    </div>
</body>

</html>