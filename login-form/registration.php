<?php include 'header.php' ?>
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

<?php include 'footer.php' ?>