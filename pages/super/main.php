<?php

    include "../../php/db.php";

    include "../../auth/super.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - ADMIN</title>
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

            ADMIN

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>

        </header>

        <main id="main">

            <div class="profileSettings">

                <div class="sectionDescription navbar text-dark justify-content-center position-relative">
                    <p class="sectionHeader ">OPTIONS</p>
                </div>

                <hr>
    
                <p class="sectionHeader">SITE USERS</p>
                <div class="sectionDescription">
                    <p>View all of the site users in a list and change user groups.</p>
                    <a href="./users.php" class="btn btn-success">SITE USERS</a>
                </div>
    
                <hr>
    
                <p class="sectionHeader">JOB OFFERS</p>
                <div class="sectionDescription">
                    <p>View all of the job offers and change their status.</p>
                    <a href="./offers.php" class="btn btn-success">JOB OFFERS</a>
                </div>

                <hr>
    
                <p class="sectionHeader">HR ACCOUNTS</p>
                <div class="sectionDescription">
                    <p>Create a new HR account.</p>
                    <a href="./register.php" class="btn btn-success">CREATE ACCOUNT</a>
                </div>
    
                <hr>

                <p class="sectionHeader">CHANGE PASSWORD</p>
                <div class="sectionDescription">
                    <p>Change a users password.</p>
                    <a href="./changepassword.php" class="btn btn-success">CHANGE PASSWORD</a>
                </div>
    
                <hr>
                
                <p class="sectionHeader">STATISTICS</p>
                <div class="sectionDescription">
                    <p>View various site statistics.</p>
                    <a href="./statistics.php" class="btn btn-success">STATISTICS</a>
                </div>
    
                <hr>

            </div>

        </main>

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../script.js"></script>
    </div>
</body>

</html>