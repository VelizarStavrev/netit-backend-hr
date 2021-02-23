<?php

    include "../../php/db.php";

    include "../../auth/super.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netit-backend-hr - SETTINGS</title>
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

            SETTINGS

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

                <div class="position-relative">
                    <p class="sectionHeader" style="text-align: left;">AVATAR</p>
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row">
                            <img class="ps-3" style="width: 90px;" src="https://www.treehugger.com/thmb/aW3Ql9fQ-V1QxUSI7_5iN0o9Dlk=/750x750/smart/filters:no_upscale()/__opt__aboutcom__coeus__resources__content_migration__mnn__images__2017__05__lady-bug-on-leaf-e3cd36cdc3024129b61926ddf6ef386e.jpg" alt="tempimage">
                            <div>
                                <p>You can view and change your avatar from this setting.</p>
                                <div class="input-group px-3">
                                    <input name="file" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="backBtn" class="p-2 position-absolute end-0 top-0 btn btn-outline-success rounded-circle">
                        <img src="../../static/icons/back.svg" alt="profile" style="width: 22.5px;">
                    </button>
                </div>
    
                <hr>
    
                <p class="sectionHeader">LANGUAGE</p>
                <div class="sectionDescription">
                    <p>You can change the site language from this setting.</p>
                </div>

                <div class="form-floating mb-3">
                    <select name="language" class="form-select form-select-lg fw-bold" aria-label="Location Select">
                            <option value="english" selected>ENGLISH</option>
                            <option value="bulgarian" disabled>BULGARIAN</option>
                    </select>
                    <label for="language">CURRENT LANGUAGE</label>
                </div>
    
                <hr>

                <p class="sectionHeader">COLOR MODE</p>
                <div class="sectionDescription">
                    <p>You can change the site color mode from this setting.</p>
                </div>

                <div class="form-floating mb-3">
                    <select name="colormode" class="form-select form-select-lg fw-bold" aria-label="Location Select">
                            <option value="light" selected>LIGHT</option>
                            <option value="dark" disabled>DARK</option>
                    </select>
                    <label for="colormode">CURRENT LANGUAGE</label>
                </div>

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