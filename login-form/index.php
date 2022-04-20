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
                        <a class="nav-link scrollto active" href="index.php"><i class="fa-solid fa-user-shield"></i>Log In</a>
                       
                        <a class="nav-link scrollto " href="registration.php"><i class="fa-solid fa-user-plus"></i>Sign Up</a>
                    </li>
                </ul>
                <i class="bx bx-list-plus mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div class="container-xxl">

        <section class="login-section">
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

            // If the user already logged in 
            if (!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])) {
                include_once 'User.class.php';
                $user = new User();
                $conditions['where'] = array(
                    'id' => $sessData['userID']
                );
                $conditions['return_type'] = 'single';
                $userData = $user->getRows($conditions);
            }
            ?>

            <?php if (!empty($userData)) { ?>
                <h2>Welcome <?php echo $userData['first_name']; ?>!</h2>
                <a href="userAccount.php?logoutSubmit=1" class="logout">Logout</a>
                <div class="regisFrm">
                    <p><b>Name: </b><?php echo $userData['first_name'] . ' ' . $userData['last_name']; ?></p>
                    <p><b>Email: </b><?php echo $userData['email']; ?></p>
                    <p><b>Phone: </b><?php echo $userData['phone']; ?></p>
                </div>
            <?php } else { ?>
                <h2>Login to Your Account</h2>

                <!-- Status message -->
                <?php if (!empty($statusMsg)) { ?>
                    <div class="status-msg <?php echo $status; ?>"><?php echo $statusMsg; ?></div>
                <?php } ?>

                <div class="form__box">
                    <form class="form" action="userAccount.php" method="post">
                        <input class="form__input" type="email" name="email" placeholder="Email" value="<?php echo !empty($postData['email']) ? $postData['email'] : ''; ?>" required="">
                        <input class="form__input" type="password" name="password" placeholder="Password" required="">
                        <div class="send-button">
                            <input class="send-button__input" type="submit" name="loginSubmit" value="Login">
                        </div>
                        <p>Don't have an account? <a class="form__link" href="registration.php">Register</a></p>
                    </form>
                    
                </div>
            <?php } ?>
        </section>

    </div>



    <script src="../assets/js/main.js"></script>

</body>