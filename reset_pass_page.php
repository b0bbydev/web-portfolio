<?php
include_once('includes/reset_pass.php');
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
    <!-- SweetAlert -->
    <link rel="stylesheet" href="assets/css/theme-dark/dark.css">
    <script src="assets/css/sweetalert2/dist/sweetalert2.min.js"></script>
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


<!-- Register Page -->
<section id="about" class="wrapper post bg-img" data-bg="banner3.png">
    <div class="inner">
        <article class="box">
            <header>
                <h2>Reset Password</h2>
                <p>Fill out the form to reset your password.</p>
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
