<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Notice Coding Exercise</title>
    <meta content="Small exercises while working with the code (web development) that I performed for the Notice company, Paris." name="description">
    <meta content="web development, code" name="keywords">

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <!-- Bootstrap Grid Only -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-5.1.3/bootstrap-grid.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free-6.1.1-web/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="../assets/img/logo.png" alt="">
                <span>Notice Coding Exercise </span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a id="homeActive" class="nav-link scrollto" href="../index.html">Home</a></li>
                    <li><a class="nav-link scrollto" href="../about.html">About us</a></li>
                    <li><a class="nav-link scrollto" href="../contact.html">Contact</a></li>
                    <li><a class="nav-link scrollto" href="../profile.html">Profile</a></li>
                    <li><a class="nav-link scrollto" href="../time.html">Get Time</a></li>
                    <li>
                        <a class="nav-link scrollto " href="index.php"><i class="fa-solid fa-user-shield"></i>Log In</a>

                        <a class="nav-link scrollto active" href="registration.php"><i class="fa-solid fa-user-plus"></i>Sign Up</a>
                    </li>
                </ul>
                <i class="bx bx-list-plus mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <section class="registration-form">

        <div class="container-xxl">

            <?php
            // Start session 
            session_start();

            // Get data from session 
            $sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

            // Get status from session 
            if (!empty($sessData['status']['msg'])) {
                $statusMsg = $sessData['status']['msg'];
                $status = $sessData['status']['type'];
                unset($_SESSION['sessData']['status']);
            }

            $postData = array();
            if (!empty($sessData['postData'])) {
                $postData = $sessData['postData'];
                unset($_SESSION['postData']);
            }
            ?>

            <!-- Status message -->
            <?php if (!empty($statusMsg)) { ?>
                <div class="status-msg <?php echo $status; ?>"><?php echo $statusMsg; ?></div>
            <?php } ?>
            <div class="regist-form">
                <form class="form" action="userAccount.php" method="post">
                    <input class="form__input" type="text" name="first_name" placeholder="First Name" value="<?php echo !empty($postData['first_name']) ? $postData['first_name'] : ''; ?>" required="">
                    <input class="form__input" type="text" name="last_name" placeholder="Last Name" value="<?php echo !empty($postData['last_name']) ? $postData['last_name'] : ''; ?>" required="">
                    <input class="form__input" type="email" name="email" placeholder="Email" value="<?php echo !empty($postData['email']) ? $postData['email'] : ''; ?>" required="">
                    <input class="form__input" type="text" name="phone" placeholder="Phone number" value="<?php echo !empty($postData['phone']) ? $postData['phone'] : ''; ?>" required="">
                    <input class="form__input" type="password" name="password" placeholder="Password" required="">
                    <input class="form__input" type="password" name="confirm_password" placeholder="Confirm password" required="">
                    <div class="send-button">
                        <input class="send-button__input" type="submit" name="signupSubmit" value="Create Account">
                    </div>
                </form>
            </div>

        </div> <!-- End Container -->

    </section>

    <script src="../assets/js/main.js"></script>

</body>