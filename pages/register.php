<?php

    include "../php/db.php";

    include "../auth/notLogged.php";

    include "../php/register.php";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - REGISTER</title>
    <link rel="icon" href="../static/icons/netit.svg" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/css/style.min.css">
</head>

<body>
    <div class="container-page">

        <header class="navbar bg-success text-light justify-content-center">REGISTER</header>

        <main id="main">

            <!-- Employee -->
            <form id="formEmployee" method="POST" action="./register.php">

                <!-- First part of the form -->
                <div id="formEmployeeFirst" class="formFirst">
                    <div class="radioDiv">
                        <div>
                            <input class="radioBtn form-check-input" type="radio" name="roles" value="employee" checked autocomplete="off">
                            <label for="employee"> Employee</label>
                        </div>
                        <div>
                            <input class="radioBtn form-check-input" type="radio" id="employerRBTN" name="roles123" value="employer" autocomplete="off">
                            <label for="employer"> Employer</label>
                        </div>
                    </div>

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

                    <div class="input">
                        <button class="btn btn-success" id="regBtnOneEmployee">NEXT</button>
                        <p class="smallText">Have an account? <a href="./login.php">Login now!</a></p>
                    </div>
                </div>

                <!-- Second part of the form -->
                <div id="formEmployeeSecond" class="formSecond">
                    <div class="radioDiv">
                        <div>
                            <input class="form-check-input" type="radio" name="rolesTwo" value="employee" checked>
                            <label for="employee"> Employee</label>
                        </div>
                    </div>

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
                            <p class="smallText">Have an account? <a href="./login.php">Login now!</a></p>
                        </div>

                        <div class="input">
                            <button class="btn btn-outline-success" id="regBtnBackTwoEmployee">BACK</button>
                        </div>
                    </div>
                </div>

                <!-- Third part of the form -->
                <div id="formEmployeeThird" class="formThird">
                    <div class="radioDiv">
                        <div>
                            <input class="form-check-input" type="radio" name="rolesThree" value="employee" checked>
                            <label for="employee"> Employee</label>
                        </div>
                    </div>

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
                            <p class="smallText">Have an account? <a href="./login.php">Login now!</a></p>
                        </div>

                        <div class="input">
                            <button class="btn btn-outline-success" id="regBtnBackThreeEmployee">BACK</button>
                        </div>
                    </div>
                </div>

            </form>

            <!-- Employer -->
            <form id="formEmployer" method="POST" action="./register.php">

                <!-- First part of the form -->
                <div id="formEmployerFirst" class="formFirst">
                    <div class="radioDiv">
                        <div>
                            <input class="radioBtn form-check-input" type="radio" id="employeeRBTN" name="roles321" value="employee" autocomplete="off">
                            <label for="employee"> Employee</label>
                        </div>
                        <div>
                            <input class="radioBtn form-check-input" type="radio" name="roles" value="employer" checked autocomplete="off">
                            <label for="employer"> Employer</label>
                        </div>
                    </div>

                    <div class="input" id="inputOneEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                            <label for="email">E-mail</label>
                        </div>
                        <p class="errorText">INVALID E-MAIL!</p>
                    </div>

                    <div class="input" id="inputTwoEmployer">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>
                        <p class="errorText">USERNAME TOO SHORT!</p>
                    </div>

                    <div class="input" id="inputThreeEmployer">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                        <p class="errorText">MIN 6 CHARS, ALLOWED A-z 0-9 _.!?$#%</p>
                    </div>

                    <div class="input" id="inputFourEmployer">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" placeholder="Repeat Password" required>
                        <label for="repassword">Repeat Password</label>
                    </div>
                        <p class="errorText">PASSWORDS DO NOT MATCH!</p>
                    </div>

                    <div class="input">
                        <button class="btn btn-success" id="regBtnOneEmployer">NEXT</button>
                        <p class="smallText">Have an account? <a href="./login.php">Login now!</a></p>
                    </div>
                </div>

                <!-- Second part of the form -->
                <div id="formEmployerSecond" class="formSecond">
                    <div class="radioDiv">
                        <div>
                            <input class="form-check-input" type="radio" name="rolesTwo" value="employer" checked>
                            <label for="employer"> Employer</label>
                        </div>
                    </div>

                    <div class="input" id="inputFiveEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="companyName" placeholder="Company Name" required>
                            <label for="companyName">Company Name</label>
                        </div>
                        <p class="errorText">COMPANY NAME IS BLANK!</p>
                    </div>

                    <div class="input" id="inputSixEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="industry" placeholder="Industry" required>
                            <label for="industry">Industry</label>
                        </div>
                        <p class="errorText">INDUSTRY IS BLANK!</p>
                    </div>

                    <div class="input" id="inputSevenEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="country" placeholder="Country" required>
                            <label for="country">Country</label>
                        </div>
                        <p class="errorText">COUNTRY IS BLANK!</p>
                    </div>

                    <div class="input" id="inputEightEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="city" placeholder="City" required>
                            <label for="city">City</label>
                        </div>
                        <p class="errorText">CITY IS BLANK!</p>
                    </div>

                    <div class="btnDiv">
                        <div class="input">
                            <button class="btn btn-success" id="regBtnTwoEmployer">NEXT</button>
                            <p class="smallText">Have an account? <a href="./login.php">Login now!</a></p>
                        </div>

                        <div class="input">
                            <button class="btn btn-outline-success" id="regBtnBackTwoEmployer">BACK</button>
                        </div>
                    </div>
                </div>

                <!-- Third part of the form -->
                <div id="formEmployerThird" class="formThird">
                    <div class="radioDiv">
                        <div>
                            <input class="form-check-input" type="radio" name="rolesThree" value="employer" checked>
                            <label for="employer"> Employer</label>
                        </div>
                    </div>

                    <div class="input" id="inputNineEmployer">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                            <label for="description">Description</label>
                        </div>
                        <p class="errorText">DESCRIPTION IS BLANK!</p>
                    </div>

                    <div class="input" id="inputTenEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="website" placeholder="Website" required>
                            <label for="website">Website</label>
                        </div>
                        <p class="errorText">WEBSITE IS BLANK!</p>
                    </div>

                    <div class="input" id="inputElevenEmployer">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="linkedin" placeholder="LinkedIn" required>
                            <label for="linkedin">LinkedIn</label>
                        </div>
                        <p class="errorText">LINKEDIN IS BLANK!</p>
                    </div>

                    <div class="btnDiv">
                        <div class="input">
                            <button type="submit" class="btn btn-success" id="regBtnThreeEmployer">REGISTER</button>
                            <p class="smallText">Have an account? <a href="./login.php">Login now!</a></p>
                        </div>

                        <div class="input">
                            <button class="btn btn-outline-success" id="regBtnBackThreeEmployer">BACK</button>
                        </div>
                    </div>
                </div>

            </form>

        </main>

        <footer class="bg-success">© 2021 VELIZAR STAVREV - NET IT ACADEMY</footer>

        <!-- Scripts -->
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../scripts/register.js"></script>
    </div>
</body>

</html>