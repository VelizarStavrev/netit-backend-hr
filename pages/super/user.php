<?php

    include "../../php/db.php";

?>

<?php 

    if (!$_SESSION['logged_in'] || $_SESSION['role_id'] != 1) {

        if (!$_SESSION['role_id']) {
            $_SESSION['logged_in'] = null;
        }
        
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = '../../login.php';
        header("Location: http://$host$uri/$extra");
        exit;
        
    } else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - SITE USERS</title>
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

            SITE USERS

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

                $userid = substr($_SERVER['QUERY_STRING'], 3);

                // user
                $query = "SELECT users.* FROM users WHERE users.id = $userid";
                $result = mysqli_query($DB, $query);
                $user = mysqli_fetch_assoc($result);

                $date = date_create();
                date_timestamp_set($date, $user['joined']);
                $joined = date_format($date, 'Y-m-d H:i:s');

                $query = "SELECT * FROM users, employee_info WHERE users.id = $userid AND employee_info.user_id = $userid";
                $result = mysqli_query($DB, $query);
                $info = mysqli_fetch_assoc($result);

            ?>

                <div class="sectionDescription navbar text-dark justify-content-center position-relative">
                    <p class="sectionHeader "><?php echo $user['username'] ?></p>
                    <a href="./users.php" class="p-2 position-absolute end-0 btn btn-outline-success rounded-circle">
                        <img src="../../static/icons/back.svg" alt="profile">
                    </a>
                </div>

                <hr>
    
                <p class="sectionHeader">USER INFO</p>
                <div class="sectionDescription d-flex flex-column text-start">
                    <p class="w-100">First Name: <?php echo $info['first_name'] ?></p>
                    <p class="w-100">Last Name: <?php echo $info['last_name'] ?></p>
                    <p class="w-100">E-mail: <?php echo $user['email'] ?></p>
                    <p class="w-100">Joined: <?php echo $joined ?></p>
                    <p class="w-100">From: <?php echo $info['country'] ?>, <?php echo $info['city'] ?></p>


                </div>
    
                <hr>
    
                <p class="sectionHeader">CHANGE ROLE</p>
                <div class="sectionDescription d-flex flex-column text-start">

                    <div class="input align-self-start ms-3 mt-1">
                        <div class="form-floating mb-3">
                            <select name="status" class="form-select form-select-lg fw-bold" aria-label="Location Select" id="inputStatus">
                                <?php 
                                    switch ($user['role']) {
                                        
                                        case '4':
                                ?>
                                            <option value="employee" selected>EMPLOYEE</option>
                                            <option value="hr">HR</option>
                                <?php
                                            break;

                                        case '2':
                                ?>
                                        <option value="employee">EMPLOYEE</option>
                                        <option value="hr" selected>HR</option>
                                <?php
                                            break;
                                    }
                                ?>
                            </select>
                            <label for="role">ROLE:</label>
                        </div>
                    </div>
                </div>
    
                <hr>

            </div>

        </main>

        <!-- Static Footer -->
        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Main script -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/super/user.js"></script>
    </div>
</body>

</html>

<?php

    }

?>