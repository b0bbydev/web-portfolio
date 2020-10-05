<?php
include_once('includes/register.php');
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
                <h2>Register</h2>
                <p>Feel free to register on the website! There is <b>no</b> email validation required as this is purely for demonstration purposes.</p>
            </header>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <h5>First Name</h5>
                    <input id="first_name" value="<?php echo $first_name ?>" type="text" name="first_name" class="form-control" title="Please enter letters only without any spaces.">
                    <span class="error"><?php echo (!empty($first_name_err)) ? $first_name_err : ''; ?></span>
                </div>

                <div>
                    <h5>Username</h5>
                    <input id="username" value="<?php echo $username ?>" type="text" name="username" class="form-control">
                    <span class="error"><?php echo (!empty($username_err)) ? $username_err : ''; ?></span>
                </div>

                <div>
                    <h5>Password</h5>
                    <input id="password" type="text" name="password" class="form-control">
                    <span class="error"><?php echo (!empty($password_err)) ? $password_err : ''; ?></span>
                </div>

                 <div>
                    <h5>Confirm Password</h5>
                     <input id="password" type="text" name="confirm_password" class="form-control">
                     <span class="error"><?php echo (!empty($confirm_password_err)) ? $confirm_password_err : ''; ?></span>
                 </div>
                <br>
                <input type="submit" class="btn btn-primary" value="Register" name="register" id="register">
                <br>
                <br>
                <p>Already have an account? <a href="login_page.php"><strong>Login here</a>.</strong></p>
            </form>
        </article>
    </div>
</section>
</body>
</html>
