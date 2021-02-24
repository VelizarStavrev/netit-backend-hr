<?php

    include "../php/db.php";

    include "../auth/notLogged.php";

    include "../php/login.php";

?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - LOGIN</title>
    <link rel="icon" href="../static/icons/netit.svg" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/css/style.min.css">
</head>

<body>
    <div class="container-page">

        <header class="navbar bg-success text-light justify-content-center">LOGIN</header>

        <main id="main">

            <form method="POST">
                <div id="inputOne" class="input">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>
                    <p class="errorText">THE INFO DOES NOT MATCH!</p>
                </div>

                <div id="inputTwo" class="input">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <p class="smallText">Forgot your password? <a href="./reset.php">Reset now!</a></p>
                </div>

                <div class="input">
                    <button type="submit" id="loginBtn" class="btn btn-success">LOGIN</button>
                    <p class="smallText">Don't have an account? <a href="./register.php">Register now!</a></p>
                </div>
            </form>

        </main>

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../scripts/login.js"></script>
    </div>
</body>

</html>