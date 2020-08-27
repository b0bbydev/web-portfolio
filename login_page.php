<?php
include_once('includes/login.php');
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

<!-- Login Page -->
<section id="about" class="wrapper post bg-img" data-bg="banner3.png">
    <div class="inner">
        <article class="box">
            <header>
                <h2>Login</h2>
                <p>Please fill in your credentials to login.</p>
            </header>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <h5>Username</h5>
                    <label for="username"><input id="username" value="<?php echo $username ?>" type="text" name="username" class="form-control"></label>
                    <span class="error"><?php echo (!empty($username_err)) ? $username_err : ''; ?></span>
                </div>

                <div>
                    <h5>Password</h5>
                    <label for="password"><input id="password" type="text" name="password" class="form-control"></label>
                    <span class="error"><?php echo (!empty($password_err)) ? $password_err : ''; ?></span>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" value="Login" name="login" id="login">
                <br>
                <br>
                <p>Don't have an account? <a href="register_page.php"><strong>Sign up now</strong></a>.</p>
            </form>
        </article>
    </div>
</section>
</body>
</html>
