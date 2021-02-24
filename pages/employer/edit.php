<?php

    include "../../php/db.php";

    include "../../auth/employer.php";

    include "../../php/employer/editOffer.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - EDIT OFFER</title>
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

            EDIT OFFER

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>
        </header>

        <main id="main">

            <!-- Page Container -->
            <div class="d-flex flex-column gap-3">

                <!-- Input Form -->
                <form method="POST">

                    <?php

                        $currentjobid = substr($_SERVER['QUERY_STRING'], 3);

                        $query = "SELECT * FROM jobs WHERE jobs.id = $currentjobid";
                        $result = mysqli_query($DB, $query);
                        $job = mysqli_fetch_assoc($result);

                        $salary = '';

                        if ($job['salary']) {
                            $salary = $job['salary'];
                        }

                        if ($job['creator'] != $_SESSION['user_id']) {

                            $host  = $_SERVER['HTTP_HOST'];
                            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                            $extra = './main.php';
                            header("Location: http://$host$uri/$extra");
                        }

                    ?>

                    <div class="input" id="inputOne">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="jobtitle" placeholder="Jon Title" value="<?php echo $job['title'] ?>" required>
                            <label for="jobtitle">Job Title</label>
                        </div>
                        <p class="errorText">JOB TITLE IS BLANK!</p>
                    </div>

                    <div class="input" id="inputTwo">
                        <div class="form-floating mb-3">
                            <select name="joblocation" class="form-select form-select-lg fw-bold" aria-label="Location Select">
                                <?php 
                                    if ($job['location'] == 'Office') {
                                ?>
                                    <option value="Office" selected>Office</option>
                                    <option value="Remote">Remote</option>
                                <?php
                                    } else { // Remote
                                ?>
                                    <option value="Office">Office</option>
                                    <option value="Remote" selected>Remote</option>
                                <?php
                                    }
                                ?>
                            </select>
                            <label for="joblocation">Job Location</label>
                        </div>
                        <p class="errorText">LOCATION IS BLANK!</p>
                    </div>

                    <div class="input" id="inputThree">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="jobsalary" placeholder="Salary" value="<?php echo $job['salary'] ?>">
                            <label for="jobsalary">Salary</label>
                        </div>
                        <p class="errorText">SALARY IS BLANK!</p>
                    </div>

                    <div class="input" id="inputFour">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="jobdescription" placeholder="Job Description" required><?php echo $job['description'] ?></textarea>
                            <label for="jobdescription">Job Description</label>
                        </div>
                        <p class="errorText">JOB DESCRIPTION IS BLANK!</p>
                    </div>

                    <!-- Buttons -->
                    <div class="input gap-3">
                        <button type="submit" class="btn btn-success mx-2">EDIT</button>
                        <a href="./job.php?id=<?php echo $job['id'] ?>" class="btn btn-outline-success mx-2">CANCEL</a>
                    </div>

                </form>

            </div>

        </main>

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../script.js"></script>
    </div>
</body>

</html>