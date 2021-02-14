<?php

    include "../../php/db.php";

    // FUNCTIONS
    // Edit data function
    function escape($data) {
        global $DB;
        $data = trim($data);
        $data = mysqli_real_escape_string($DB, $data);
        return $data;
    }

    if(isset($_POST['confirm'])) {

        // Check DB connection
        if(!$DB) { 
            die("Connection to DB failed: ".mysqli_connect_error());
        } else {

            // Job id
            $currentjobid = substr($_SERVER['QUERY_STRING'], 3);
            $employeeid = $_SESSION['user_id'];
            $status = "applied";

            // Save timestamp
            $date = new DateTime();
            $applied = $date->getTimestamp();

            // Input fields
            // $file = escape($_POST['file']);
            // $message = escape($_POST['message']);

            $query = "INSERT INTO candidates (job_id, employee_id, status, applied) VALUE ('$currentjobid', '$employeeid', '$status', '$applied')";
            $result = mysqli_query($DB, $query);

            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = './job.php?id='.$currentjobid;
            header("Location: http://$host$uri/$extra");
        }
    }

?>

<?php 

    if (!$_SESSION['logged_in'] || $_SESSION['role_id'] != 4) {

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
    <title>netit-backend-hr - JOB OFFERS</title>
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

            JOB OFFERS

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
                $employeeid = $_SESSION['user_id'];

                $query = "SELECT users.username, employee_info.*, jobs.title FROM users, employee_info, jobs WHERE users.id = $employeeid AND employee_info.user_id = $employeeid AND jobs.id = $currentjobid";
                $result = mysqli_query($DB, $query);
                $user = mysqli_fetch_assoc($result);

            ?>

                <div class="sectionDescription navbar text-dark justify-content-center position-relative">
                    <p class="sectionHeader ">APPLYING TO... <?php echo $user['title'] ?></p>
                </div>

                <hr>
    
                <p class="sectionHeader">YOUR INFO</p>
                <div class="sectionDescription d-flex flex-column text-start">
                    <p class="w-100">Username: <?php echo $user['username'] ?></p>
                    <p class="w-100">Name: <?php echo $user['first_name'].' '.$user['last_name'] ?></p>
                    <p class="w-100">E-mail: <?php echo $user['p_email'] ?></p>
                    <p class="w-100">Phone: <?php echo $user['p_phone'] ?></p>
                </div>
    
                <hr>
    
                <form method="POST">
    
                    <p class="sectionHeader text-start">ATTACHMENTS</p>
                    <div class="sectionDescription d-flex flex-column text-start">
                        <p class="w-100">Upload file:</p>
                        <div class="input-group px-3">
                            <input name="file" type="file" class="form-control">
                        </div>
                    </div>

                    <hr>
        
                    <p class="sectionHeader">MESSAGE</p>
                    <div class="sectionDescription px-3">
                        <textarea name="message" class="form-control" aria-label="With textarea"></textarea>
                    </div>
        
                    <hr>

                    <button 
                        class="btn btn-success logout"
                        type="submit"
                        name="confirm"
                        value="confirm"
                    >CONFIRM</button>

                    <a href="./job.php?id=<?php echo $currentjobid ?>" class="btn btn-outline-success logout mx-2">CANCEL</a>

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