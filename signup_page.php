<?php
include_once('includes/signup.php');
?>

<!DOCTYPE HTML>
<!--
   @author Bobby Jonkman.
 -->

<html lang="en">
<head>
    <title>Portfolio | Bobby Jonkman</title>
    <meta charset="utf-8"/>
    <!-- viewport to help view on smaller devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- link to css file. -->
    <link rel="stylesheet" href="/assets/css/styles.css"/>
    <!-- Scripts -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.scrolly.min.js"></script>
    <script src="/assets/js/jquery.scrollex.min.js"></script>
    <script src="/assets/js/skel.min.js"></script>
    <script src="/assets/js/util.js"></script>
    <script src="/assets/js/main.js"></script>
</head>


<body>
<!-- Header -->
<header id="header">
    <div class="logo">
        <a href="index.php">Web Portfolio <span>by Bobby Jonkman</span></a>
    </div>
    <div class="crud">
        <a href="crud.php">Public Data Form</a>
        <a href="signup_page.php">Register</a>
        <a href="login_page.php">Log In</a>
        <a href="welcome_page.php">Welcome</a>
    </div>
</header>

<!-- Signup Page -->
<section id="about" class="wrapper post bg-img" data-bg="banner3.png">
    <div class="inner">
        <article class="box">
            <h2>Sign Up</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                    <h5>Username</h5>
                    <input id="username" type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>

                <div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
                    <h5>Password</h5>
                    <input id="password" type="text" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>

                <div <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>>
                    <h5>Confirm Password</h5>
                    <input id="confirm_password" type="text" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>

                <br>
                <input type="submit" class="btn btn-primary" value="Submit">
                <br>
                <p>Already have an account? <a href="login_page.php">Login here</a>.</p>
            </form>
        </article>
    </div>
</section>
</body>
</html>
