<?php

    include "../../php/db.php";

?>

<?php 

    if (!$_SESSION['logged_in'] || $_SESSION['role_id'] != 2) {

        if (!$_SESSION['role_id']) {
            $_SESSION['logged_in'] = null;
        }
        
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = '../login.php';
        header("Location: http://$host$uri/$extra");
        exit;
        
    } else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - MESSAGES</title>
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

            MESSAGES

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>
            
        </header>

        <!-- Div holding the changeable component -->
        <main id="main">

            <div class="profileSettings">

            <?php

                $messageid = substr($_SERVER['QUERY_STRING'], 3);

                $query = "SELECT * FROM messages WHERE id = $messageid";
                $result = mysqli_query($DB, $query);
                $info = mysqli_fetch_assoc($result);

                $date = date_create();
                date_timestamp_set($date, $info['sent']);
                $sent = date_format($date, 'Y-m-d H:i');
            ?>

                <div class="sectionDescription navbar text-dark justify-content-center position-relative">
                    <p class="sectionHeader ">MESSAGE</p>
                    <button id="backBtn" class="p-2 position-absolute end-0 btn btn-outline-success rounded-circle">
                        <img src="../../static/icons/back.svg" alt="profile">
                    </button>
                </div>

                <hr>
    
                <p class="sectionHeader">USER INFO</p>
                <div class="sectionDescription d-flex flex-column text-start">
                    <p class="w-100">From: <?php echo $info['sender'] ?></p>
                    <p class="w-100">To: <?php echo $info['receiver'] ?></p>
                    <p class="w-100">Topic: <?php echo $info['topic'] ?></p>
                    <p class="w-100">Sent: <?php echo $sent ?></p>
                    <p class="w-100">Message: <?php echo $info['message'] ?></p>

                </div>
    
                <hr>
    
            </div>

        </main>

        <!-- Static Footer -->
        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Main script -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/profile.js"></script>
    </div>
</body>

</html>

<?php

    }

?>