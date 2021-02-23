<?php

    include "../../php/db.php";

    include "../../auth/hr.php";

    include "../../php/employee/accountInfo.php";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - ACCOUNT INFO</title>
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

            ACCOUNT INFO

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>

        </header>

        <!-- Div holding the changeable component -->
        <main id="main">

            <!-- First part of the form -->
            <form id="formEmployee" method="POST">

            <?php

                $userid = $_SESSION['user_id'];

                $query = "SELECT * FROM users, employee_info WHERE users.id = $userid AND employee_info.user_id = $userid";
                $result = mysqli_query($DB, $query);
                $user = mysqli_fetch_assoc($result);

            ?>

                <div id="formEmployeeFirst" class="formFirst">

                    <div class="input" id="inputThreeEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="password" placeholder="Password" value="newpassword" required>
                            <label for="password">New Password</label>
                        </div>
                        <p class="errorText">MIN 6 CHARS, ALLOWED A-z 0-9 _.!?$#%</p>
                    </div>

                    <div class="input" id="inputFourEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" placeholder="Repeat Password" value="newpassword" required>
                            <label for="repassword">Repeat Password</label>
                        </div>
                        <p class="errorText">PASSWORDS DO NOT MATCH!</p>
                    </div>

                    <div class="input" id="inputNineEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" name="emailPublic" placeholder="Public E-mail" value="<?php echo $user['p_email'] ?>" required>
                            <label for="emailPublic">Public E-mail</label>
                        </div>
                        <p class="errorText">INVALID E-MAIL!</p>
                    </div>

                    <div class="input" id="inputTenEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="phonePublic"  placeholder="Public Phone" value="<?php echo $user['p_phone'] ?>" required>
                            <label for="phonePublic">Public Phone</label>
                        </div>
                        <p class="errorText">INVALID PHONE NUMBER!</p>
                    </div>

                    <div class="input" id="inputElevenEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="website" placeholder="Website" value="<?php echo $user['p_site'] ?>" required>
                            <label for="website">Website</label>
                        </div>
                        <p class="errorText">WEBSITE IS BLANK!</p>
                    </div>

                    <div class="btnDiv">
                        <div class="input">
                            <button type="submit" class="btn btn-success">SAVE</button>
                        </div>

                        <div class="input">
                            <button type="button" class="btn btn-outline-success" id="regBtnOneEmployee">OTHER</button>
                        </div>

                        <div class="input">
                            <a href="./settings.php" class="btn btn-outline-success">CANCEL</a>
                        </div>
                    </div>

                </div>

                <!-- Second part of the form -->
                <div id="formEmployeeSecond" class="formSecond">

                    <div class="input" id="inputTwelveEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="linkedin" placeholder="LinkedIn" value="<?php echo $user['p_linkedin'] ?>" required>
                            <label for="linkedin">LinkedIn</label>
                        </div>
                        <p class="errorText">LINKEDIN IS BLANK!</p>
                    </div>

                    <div class="input" id="inputFiveEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="firstName" placeholder="First Name" value="<?php echo $user['first_name'] ?>" required>
                            <label for="firstName">First Name</label>
                        </div>
                        <p class="errorText">FNAME IS BLANK!</p>
                    </div>

                    <div class="input" id="inputSixEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="lastName" placeholder="Last Name" value="<?php echo $user['last_name'] ?>" required>
                            <label for="lastName">Last Name</label>
                        </div>
                        <p class="errorText">LNAME IS BLANK!</p>
                    </div>

                    <div class="input" id="inputSevenEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="country" placeholder="Country" value="<?php echo $user['country'] ?>" required>
                            <label for="country">Country</label>
                        </div>
                        <p class="errorText">COUNTRY IS BLANK!</p>
                    </div>

                    <div class="input" id="inputEightEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="city" placeholder="City" value="<?php echo $user['city'] ?>" required>
                            <label for="city">City</label>
                        </div>
                        <p class="errorText">CITY IS BLANK!</p>
                    </div>

                    <div class="btnDiv">
                        <div class="input">
                            <button type="submit" class="btn btn-success">SAVE</button>
                        </div>

                        <div class="input">
                            <button type="button" class="btn btn-outline-success" id="regBtnBackTwoEmployee">BACK</button>
                        </div>

                        <div class="input">
                            <a href="./settings.php" class="btn btn-outline-success">CANCEL</a>
                        </div>
                    </div>
                </div>

            </form>

        </main>

        <!-- Static Footer -->
        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Main script -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/employee/accountInfo.js"></script>
    </div>
</body>

</html>