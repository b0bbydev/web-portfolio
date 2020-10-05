<?php
include_once('includes/reset_pass.php');
?>

<!DOCTYPE HTML>
<!--
   @author Bobby Jonkman.
 -->

<html lang="en">

<!-- Include the head file for styling, js links etc.. -->
<?php include('partials/head.php'); ?>

<body>

<!-- Include the header file which contains the navigation links on the site. -->
<?php include('partials/header.php'); ?>

<!-- Register Page -->
<section id="about" class="wrapper post bg-img" data-bg="banner3.webp">
    <div class="inner">
        <article class="box">
            <header>
                <h2>Reset Password</h2>
                <p><?php echo $_SESSION['username'] ?>, please fill out the form to reset your password.</p>
            </header>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <h5>New Password</h5>
                    <label for="password"><input type="text" name="new_password" class="form-control"></label>
                    <span class="error"><?php echo (!empty($new_password_err)) ? $new_password_err : ''; ?></span>
                </div>

                <div>
                    <h5>Confirm Password</h5>
                    <label for="password"><input type="text" name="confirm_password" class="form-control"></label>
                    <span class="error"><?php echo (!empty($confirm_password_err)) ? $confirm_password_err : ''; ?></span>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="cancel" href="index.php">Cancel</a>
            </form>
        </article>
    </div>
</section>
</body>
</html>
