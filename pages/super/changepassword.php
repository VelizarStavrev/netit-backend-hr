<?php

    include "../../php/db.php";

    include "../../auth/super.php";

    include "../../php/super/changePassword.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - CHANGE PASSWORD</title>
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

            CHANGE PASSWORD

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>

        </header>

        <main id="main">

            <form method="POST">
                <div class="input">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="username" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <p class="errorText">THE INFO DOES NOT MATCH!</p>
                </div>
                <div class="input">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="newpassword" placeholder="New Password">
                        <label for="newpassword">New Password</label>
                    </div>
                    <p class="errorText">THE INFO DOES NOT MATCH!</p>
                </div>
                
                <div class="btnDiv">
                    <div class="input">
                        <button type="submit" class="btn btn-success" id="regBtnOneEmployee">CHANGE</button>
                    </div>

                    <div class="input">
                        <a href="./main.php" class="btn btn-outline-success">CANCEL</a>
                    </div>
                </div>
            </form>

        </main>

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../script.js"></script>
    </div>
</body>

</html>