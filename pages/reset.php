<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - RESET</title>
    <link rel="icon" href="../static/icons/netit.svg" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/css/style.min.css">
</head>

<body>
    <div class="container-page">

        <!-- DOM manipulated header -->
        <header class="navbar bg-success text-light justify-content-center">RESET</header>

        <!-- Div holding the changeable component -->
        <main id="main">

            <form action="">
                <div class="input">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="email" placeholder="E-mail">
                        <label for="e-mail">E-mail</label>
                    </div>
                    <p class="errorText">THE INFO DOES NOT MATCH!</p>
                </div>
                <div class="input">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <p class="errorText">THE INFO DOES NOT MATCH!</p>
                </div>
                <div class="input">
                    <button type="button" class="btn btn-success">RESET</button>
                    <p class="smallText">Don't have an account? <a href="./register.php">Register now!</a></p>
                </div>
            </form>

        </main>

        <!-- Static Footer -->
        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Main script -->
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../script.js"></script>
    </div>
</body>

</html>