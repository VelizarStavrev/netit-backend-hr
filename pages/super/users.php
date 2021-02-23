<?php

    include "../../php/db.php";

    include "../../auth/super.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - SITE USERS</title>
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

            SITE USERS

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
                                    <input class="form-check-input" type="checkbox" value="employee">
                                    <label class="form-check-label" for="employee">
                                        EMPLOYEE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="hr">
                                    <label class="form-check-label" for="hr">
                                        HR
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
                                    <input class="form-check-input" type="radio" name="sortfilter" value="username-az" checked>
                                    <label class="form-check-label" for="username-za">
                                        USERNAME - A-Z
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="username-za">
                                    <label class="form-check-label" for="username-za">
                                        USERNAME - Z-A
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="role-az">
                                    <label class="form-check-label" for="role-az">
                                        ROLE - A-Z
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sortfilter" value="role-za">
                                    <label class="form-check-label" for="role-za">
                                        ROLE - Z-A
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
                        $query = "SELECT * FROM users WHERE (role = 2 OR role = 4) ORDER BY username ASC LIMIT 5";
                        $result = mysqli_query($DB, $query);

                        if (mysqli_num_rows($result) < 1) {

                            echo '<li class="list-group-item list-group-item-action d-flex justify-content-center">NO USERS YET!</li>';

                        } else {

                            foreach ($result as $row) {
                                
                                $role = '';

                                if ($row['role'] == 2) {

                                    $role = 'HR';

                                } else {

                                    $role = 'Employee';
                                }

                                echo    '<a href="./user.php?id='.$row['id'].'" class="list-group-item list-group-item-action d-flex align-items-center">
                                            <div class="w-100">
                                                <p class="fw-bold fs-4 mb-1">'.strtoupper($row['username']).'</p>
                                                <p class="fs-5 mb-0"> Role: '.$role.'</p>
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

                            $query = "SELECT COUNT(*) FROM users WHERE (role = 2 OR role = 4)";
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
        <script src="../../scripts/super/main.js"></script>
    </div>
</body>

</html>