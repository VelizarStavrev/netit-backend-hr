<?php

    include "../../php/db.php";

    include "../../auth/employer.php";

    include "../../php/employer/accountInfo.php";

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

        <main id="main">

            <form id="formEmployee" method="POST">

            <?php

                $userid = $_SESSION['user_id'];

                $query = "SELECT * FROM users, employer_info WHERE users.id = $userid AND employer_info.user_id = $userid";
                $result = mysqli_query($DB, $query);
                $user = mysqli_fetch_assoc($result);

            ?>

                <div id="formEmployeeFirst" class="formFirst">

                    <div class="input" id="inputThreeEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="password" placeholder="Password" value="newpassword" required>
                            <label for="password">New Password</label>
                        </div>
                        <p class="errorText">MIN 6 CHARS, ALLOWED A-z 0-9 _.!?$#%</p>
                    </div>

                    <div class="input" id="inputFourEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" placeholder="Repeat Password" value="newpassword" required>
                            <label for="repassword">Repeat Password</label>
                        </div>
                        <p class="errorText">PASSWORDS DO NOT MATCH!</p>
                    </div>

                    <div class="input" id="inputSixEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="industry" placeholder="Industry" value="<?php echo $user['industry'] ?>" required>
                            <label for="industry">Industry</label>
                        </div>
                        <p class="errorText">INDUSTRY IS BLANK!</p>
                    </div>

                    <div class="input" id="inputSevenEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="country" placeholder="Country" value="<?php echo $user['country'] ?>" required>
                            <label for="country">Country</label>
                        </div>
                        <p class="errorText">COUNTRY IS BLANK!</p>
                    </div>

                    <div class="input" id="inputEightEmployer">
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
                            <button type="button" class="btn btn-outline-success" id="regBtnOneEmployee">OTHER</button>
                        </div>

                        <div class="input">
                            <a href="./settings.php" class="btn btn-outline-success">CANCEL</a>
                        </div>
                    </div>

                </div>

                <!-- Second part of the form -->
                <div id="formEmployeeSecond" class="formSecond">

                    <div class="input" id="inputNineEmployer">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="description" placeholder="Description" required><?php echo $user['company_description'] ?></textarea>
                            <label for="description">Description</label>
                        </div>
                        <p class="errorText">DESCRIPTION IS BLANK!</p>
                    </div>

                    <div class="input" id="inputTenEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="website" placeholder="Website" value="<?php echo $user['p_site'] ?>" required>
                            <label for="website">Website</label>
                        </div>
                        <p class="errorText">WEBSITE IS BLANK!</p>
                    </div>

                    <div class="input" id="inputElevenEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="linkedin" placeholder="LinkedIn" value="<?php echo $user['p_linkedin'] ?>" required>
                            <label for="linkedin">LinkedIn</label>
                        </div>
                        <p class="errorText">LINKEDIN IS BLANK!</p>
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

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/employer/accountInfo.js"></script>
    </div>
</body>

</html>