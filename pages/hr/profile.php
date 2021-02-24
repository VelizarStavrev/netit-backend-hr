<?php

    include "../../php/db.php";

    include "../../auth/hr.php";

    include "../../php/logout.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - Profile</title>
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

            PROFILE PAGE

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
                    <p class="sectionHeader "><?php echo $_SESSION['username'] ?></p>
                    <button id="backBtn" class="p-2 position-absolute end-0 btn btn-outline-success rounded-circle">
                        <img src="../../static/icons/back.svg" alt="profile">
                    </button>
                </div>

                <hr>
    
                <p class="sectionHeader">MESSAGES</p>
                <div class="sectionDescription">
                    <p>Send messages and attachments.</p>
                    <a href="./messages.php" class="btn btn-success">MESSAGES</a>
                </div>

                <hr>
    
                <p class="sectionHeader">SETTINGS</p>
                <div class="sectionDescription">
                    <p>Change site settings such as avatar, color mode, language and account info.</p>
                    <a href="./settings.php" class="btn btn-success">SETTINGS</a>
                </div>
                
                <hr>

                <form method="POST">
                    <button 
                        class="btn btn-success logout"
                        type="submit"
                        name="logout"
                        value="logout"
                    >LOGOUT</button>
                </form>
            </div>

        </main>

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/profile.js"></script>
    </div>
</body>

</html>