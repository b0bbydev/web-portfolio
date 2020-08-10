<?php
include_once('includes/login.php');
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
        <a href="showdb_page.php">Show Database</a>
    </div>
</header>

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
                <p>Don't have an account? <a href="register_page.php"><strong>Sign up now</a>.</p>
            </form>
        </article>
    </div>
</section>
</body>
</html>
