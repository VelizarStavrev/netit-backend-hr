<?php

    include "../../php/db.php";

    include "../../auth/employer.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - PROFILE</title>
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

            PROFILE

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
                    <p class="sectionHeader ">MESSAGES</p>
                    <a href="./profile.php" class="p-2 position-absolute end-0 btn btn-outline-success rounded-circle">
                        <img src="../../static/icons/back.svg" alt="profile">
                    </a>
                </div>

                <hr>
    
                <p class="sectionHeader">SEND NEW MESSAGE</p>
                <div class="sectionDescription">
                    <p>Send a new message.</p>
                    <a href="./send.php" class="btn btn-success">SEND MESSAGE</a>
                </div>
    
                <hr>
    
                <p class="sectionHeader">SENT MESSAGES</p>
                <div class="sectionDescription">
                    <p>View your sent messages.</p>
                    <a href="./sent.php" class="btn btn-success">VIEW MESSAGES</a>
                </div>

                <hr>
    
                <p class="sectionHeader">RECEIVED MESSAGES</p>
                <div class="sectionDescription">
                    <p>View your received messages.</p>
                    <a href="./received.php" class="btn btn-success">VIEW RECEIVED</a>
                </div>
    
            </div>

        </main>

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="../../scripts/profile.js"></script> -->
    </div>
</body>

</html>