<?php

    include "../../php/db.php";

    if(isset($_POST['close'])) {

        // Check DB connection
        if(!$DB) { 
            die("Connection to DB failed: ".mysqli_connect_error());
        } else {

            $currentjobid = substr($_SERVER['QUERY_STRING'], 3);

            $query = "UPDATE jobs SET job_status = 'closed' WHERE jobs.id = $currentjobid";
            $result = mysqli_query($DB, $query);

            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = './main.php';
            header("Location: http://$host$uri/$extra");
        }
    }

?>

<?php 

    if (!$_SESSION['logged_in'] || $_SESSION['role_id'] != 3) {

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
    <title>netit-backend-hr - YOUR JOB LISTINGS</title>
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

            YOUR JOB LISTINGS

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

                $currentjobid = substr($_SERVER['QUERY_STRING'], 3);

                $query = "SELECT jobs.*, employer_info.* FROM jobs, employer_info WHERE jobs.creator = employer_info.user_id AND jobs.id = $currentjobid";
                $result = mysqli_query($DB, $query);
                $job = mysqli_fetch_assoc($result);
                
                $salary = 'Not Specified';

                if ($job['salary']) {
                    $salary = $job['salary'];
                }

                if ($job['creator'] != $_SESSION['user_id']) {
                    $host  = $_SERVER['HTTP_HOST'];
                    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                    $extra = './main.php';
                    header("Location: http://$host$uri/$extra");
                }

            ?>

                <div class="sectionDescription navbar text-dark justify-content-center position-relative">
                    <p class="sectionHeader "><?php echo $job['title'] ?></p>
                    <a href="./main.php" class="p-2 position-absolute end-0 btn btn-outline-success rounded-circle">
                        <img src="../../static/icons/back.svg" alt="profile">
                    </a>
                </div>

                <hr>
    
                <p class="sectionHeader">COMPANY INFO</p>
                <div class="sectionDescription d-flex flex-column text-start">
                    <p class="w-100">Name: <?php echo $job['company_name'] ?></p>
                    <p class="w-100">Industry: <?php echo $job['industry'] ?></p>
                    <p class="w-100">Location: <?php echo $job['country'].', '.$job['city'] ?></p>
                </div>
    
                <hr>
    
                <p class="sectionHeader">JOB INFO</p>
                <div class="sectionDescription d-flex flex-column text-start">
                    <p class="w-100">Position: <?php echo $job['title'] ?></p>
                    <p class="w-100">Location: <?php echo $job['location'] ?></p>
                    <p class="w-100">Salary: <?php echo $salary ?></p>
                </div>

                <hr>
    
                <p class="sectionHeader">JOB DESCRIPTION</p>
                <div class="sectionDescription">
                    <p><?php echo $job['description'] ?></p>
                </div>
    
                <hr>

                <form method="POST">
                    <a href="./edit.php?id=<?php echo $job['id'] ?>" class="btn btn-success logout">EDIT OFFER</a>
                    <a href="./candidates.php?id=<?php echo $job['id'] ?>" class="btn btn-success logout mx-2">CANDIDATES</a>

                    <button 
                        class="btn btn-outline-success logout"
                        type="submit"
                        name="close"
                        value="close"
                    >CLOSE OFFER</button>
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

<?php

    }

?>