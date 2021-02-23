<?php

    include "../../php/db.php";

    include "../../auth/super.php";

    include "../../php/super/register.php";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - HR REGISTER</title>
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

            HR REGISTER

            <div class="d-inline-flex align-items-center p-2 bd-highlight position-absolute top-0 end-0">
                <label for="username" class="profile-text"><?php echo $_SESSION['username'] ?></label>
                <a href="./profile.php" class='profile-icon d-inline-flex align-items-center ms-2'>
                    <img src="../../static/icons/profile.svg" alt="profile">
                </a>
            </div>

        </header>

        <!-- Div holding the changeable component -->
        <main id="main">

            <!-- HR -->
            <!-- First part of the form -->
            <form id="formEmployee" method="POST" action="./register.php">

                <div id="formEmployeeFirst" class="formFirst">

                    <div class="input" id="inputOneEmployee">
                        <div class="form-floating mb-3">
                            <input  class="form-control" type="email" name="email" placeholder="E-mail" required>
                            <label for="email">E-mail</label>
                        </div>
                        <p class="errorText">INVALID E-MAIL!</p>
                    </div>

                    <div class="input" id="inputTwoEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <label for="username">Username</label>
                        </div>
                        <p class="errorText">USERNAME TOO SHORT!</p>
                    </div>

                    <div class="input" id="inputThreeEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <p class="errorText">MIN 6 CHARS, ALLOWED A-z 0-9 _.!?$#%</p>
                    </div>

                    <div class="input" id="inputFourEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" placeholder="Repeat Password" required>
                            <label for="repassword">Repeat Password</label>
                        </div>
                        <p class="errorText">PASSWORDS DO NOT MATCH!</p>
                    </div>

                    <div class="btnDiv">
                        <div class="input">
                            <button class="btn btn-success" id="regBtnOneEmployee">NEXT</button>
                        </div>

                        <div class="input">
                            <a href="./main.php" class="btn btn-outline-success">CANCEL</a>
                        </div>
                    </div>

                </div>

                <!-- Second part of the form -->
                <div id="formEmployeeSecond" class="formSecond">

                    <div class="input" id="inputFiveEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="firstName" placeholder="First Name" required>
                            <label for="firstName">First Name</label>
                        </div>
                        <p class="errorText">FNAME IS BLANK!</p>
                    </div>

                    <div class="input" id="inputSixEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="lastName" placeholder="Last Name" required>
                            <label for="lastName">Last Name</label>
                        </div>
                        <p class="errorText">LNAME IS BLANK!</p>
                    </div>

                    <div class="input" id="inputSevenEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="country" placeholder="Country" required>
                            <label for="country">Country</label>
                        </div>
                        <p class="errorText">COUNTRY IS BLANK!</p>
                    </div>

                    <div class="input" id="inputEightEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="city" placeholder="City" required>
                            <label for="city">City</label>
                        </div>
                        <p class="errorText">CITY IS BLANK!</p>
                    </div>

                    <div class="btnDiv">
                        <div class="input">
                            <button class="btn btn-success" id="regBtnTwoEmployee">NEXT</button>
                        </div>

                        <div class="input">
                            <button class="btn btn-outline-success" id="regBtnBackTwoEmployee">BACK</button>
                        </div>
                    </div>
                </div>

                <!-- Third part of the form -->
                <div id="formEmployeeThird" class="formThird">

                    <div class="input" id="inputNineEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" name="emailPublic" placeholder="Public E-mail" required>
                            <label for="emailPublic">Public E-mail</label>
                        </div>
                        <p class="errorText">INVALID E-MAIL!</p>
                    </div>

                    <div class="input" id="inputTenEmployee">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="phonePublic"  placeholder="Public Phone" required>
                            <label for="phonePublic">Public Phone</label>
                        </div>
                        <p class="errorText">INVALID PHONE NUMBER!</p>
                    </div>

                    <div class="input" id="inputElevenEmployee">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="website" placeholder="Website" required>
                        <label for="website">Website</label>
                    </div>
                        <p class="errorText">WEBSITE IS BLANK!</p>
                    </div>

                    <div class="input" id="inputTwelveEmployee">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="linkedin" placeholder="LinkedIn" required>
                        <label for="linkedin">LinkedIn</label>
                    </div>
                        <p class="errorText">LINKEDIN IS BLANK!</p>
                    </div>

                    <div class="btnDiv">
                        <div class="input">
                            <button type="submit" class="btn btn-success" id="regBtnThreeEmployee">REGISTER</button>
                        </div>

                        <div class="input">
                            <button class="btn btn-outline-success" id="regBtnBackThreeEmployee">BACK</button>
                        </div>
                    </div>
                </div>

            </form>

        </main>

        <!-- Static Footer -->
        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Main script -->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../scripts/super/register.js"></script>
    </div>
</body>

</html>