<?php

    include "../../php/db.php";

    include "../../auth/super.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - YOUR JOB LISTINGS</title>
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

            YOUR JOB LISTINGS

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>
            
        </header>

        <main id="main">

            <div class="profileSettings">

            <?php

                $currentjobid = substr($_SERVER['QUERY_STRING'], 3);

                $query = "SELECT candidates.*, jobs.*, employer_info.*, employee_info.* FROM candidates, jobs, employer_info, employee_info WHERE candidates.id = $currentjobid AND jobs.creator = employer_info.user_id AND candidates.employee_id = employee_info.user_id AND candidates.job_id = jobs.id";
                $result = mysqli_query($DB, $query);
                $job = mysqli_fetch_assoc($result);
            ?>

                <div class="sectionDescription navbar text-dark justify-content-center position-relative">
                    <p class="sectionHeader "><?php echo strtoupper($job['title']) ?></p>
                    <a href="candidates.php?id=<?php echo $job['id'] ?>" class="p-2 position-absolute end-0 btn btn-outline-success rounded-circle">
                        <img src="../../static/icons/back.svg" alt="backicon">
                    </a>
                </div>

                <hr>
    
                <p class="sectionHeader">EMPLOYEE INFO</p>
                <div class="sectionDescription d-flex flex-column text-start">
                    <p class="w-100">First Name: <?php echo $job['first_name'] ?></p>
                    <p class="w-100">Last Name: <?php echo $job['last_name'] ?></p>
                    <p class="w-100">E-mail: <?php echo $job['p_email'] ?></p>
                    <p class="w-100">Phone: <?php echo $job['p_phone'] ?></p>
                </div>
    
                <hr>
    
                <p class="sectionHeader">ATTACHMENTS</p>
                <div class="sectionDescription d-flex flex-column text-start">
                    <p class="w-100">View attachments from the user.</p>
                </div>

                <hr>
    
                <p class="sectionHeader">STATUS</p>
                <div class="sectionDescription d-flex flex-column text-start">
                    <p class="w-100">Company: <?php echo $job['company_name'] ?></p>
                    <p class="w-100">Position: <?php echo $job['title'] ?></p>

                    <div class="input align-self-start ms-3 mt-1">
                        <div class="form-floating mb-3">
                            <select name="status" class="form-select form-select-lg fw-bold" aria-label="Location Select" id="inputStatus">
                                <?php 
                                    switch ($job['status']) {
                                        
                                        case 'applied':
                                ?>
                                            <option value="applied" selected>APPLIED</option>
                                            <option value="interviewed">INTERVIEWED</option>
                                            <option value="rejected">REJECTED</option>
                                            <option value="hired">HIRED</option>
                                <?php
                                            break;

                                        case 'interviewed':
                                ?>
                                        <option value="applied">APPLIED</option>
                                        <option value="interviewed" selected>INTERVIEWED</option>
                                        <option value="rejected">REJECTED</option>
                                        <option value="hired">HIRED</option>
                                <?php
                                            break;

                                        case 'rejected':
                                ?>
                                        <option value="applied">APPLIED</option>
                                        <option value="interviewed">INTERVIEWED</option>
                                        <option value="rejected" selected>REJECTED</option>
                                        <option value="hired">HIRED</option>

                                <?php
                                            break;

                                        case 'hired':
                                ?>
                                        <option value="applied">APPLIED</option>
                                        <option value="interviewed">INTERVIEWED</option>
                                        <option value="rejected">REJECTED</option>
                                        <option value="hired" selected>HIRED</option>
                                <?php
                                            break;
                                    }
                                ?>
                            </select>
                            <label for="status">STATUS:</label>
                        </div>
                    </div>
                </div>
    
                <hr>

            </div>

        </main>

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/super/application.js"></script>
    </div>
</body>

</html>