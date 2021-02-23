<?php

    include "../../php/db.php";

    include "../../auth/super.php";

    include "../../php/employee/sendMessage.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - SEND MESSAGE</title>
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

            SEND MESSAGE

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
                <form method="POST" action="./send.php">

                    <div class="input" id="inputOne">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="receiver" placeholder="Job Title" required>
                            <label for="receiver">Receiver</label>
                        </div>
                        <p class="errorText">RECEIVER IS BLANK!</p>
                    </div>

                    <div class="input" id="inputTwo">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="topic" placeholder="Topic">
                            <label for="topic">Topic</label>
                        </div>
                        <p class="errorText">TOPIC IS BLANK!</p>
                    </div>

                    <div class="input" id="inputThree">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                            <label for="message">Message</label>
                        </div>
                        <p class="errorText">MESSAGE IS BLANK!</p>
                    </div>

                    <!-- BUTTONS -->
                    <div class="input gap-3">
                        <button type="submit" class="btn btn-success mx-2">SEND</button>
                        <a href="./messages.php" class="btn btn-outline-success mx-2">CANCEL</a>
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