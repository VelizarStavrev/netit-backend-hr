<?php

    include "../../php/db.php";

    include "../../auth/employer.php";

    include "../../php/employer/createOffer.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - CREATE NEW OFFER</title>
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

            CREATE NEW OFFER

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
            <div class="d-flex flex-column gap-3">

                <!-- Input form -->
                <form method="POST" action="./create.php">

                    <div class="input" id="inputOne">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="jobtitle" placeholder="Job Title" required>
                            <label for="jobtitle">Job Title</label>
                        </div>
                        <p class="errorText">JOB TITLE IS BLANK!</p>
                    </div>

                    <div class="input" id="inputTwo">
                        <div class="form-floating mb-3">
                            <select name="joblocation" class="form-select form-select-lg fw-bold" aria-label="Location Select">
                                <option value="Office" selected>Office</option>
                                <option value="Remote">Remote</option>
                            </select>
                            <label for="joblocation">Job Location</label>
                        </div>
                        <p class="errorText">LOCATION IS BLANK!</p>
                    </div>

                    <div class="input" id="inputThree">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="jobsalary" placeholder="Salary">
                            <label for="jobsalary">Salary</label>
                        </div>
                        <p class="errorText">SALARY IS BLANK!</p>
                    </div>

                    <div class="input" id="inputFour">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="jobdescription" placeholder="Job Description" required></textarea>
                            <label for="jobdescription">Job Description</label>
                        </div>
                        <p class="errorText">JOB DESCRIPTION IS BLANK!</p>
                    </div>

                    <!-- BUTTONS -->
                    <div class="input gap-3">
                        <button type="submit" class="btn btn-success mx-2">CREATE</button>
                        <a href="./main.php" class="btn btn-outline-success mx-2">CANCEL</a>
                    </div>

                </form>

            </div>

        </main>

        <!-- Static Footer -->
        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Main script -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../script.js"></script>
    </div>
</body>

</html>