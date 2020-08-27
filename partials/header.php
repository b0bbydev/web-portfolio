<?php
?>

<header id="header">
    <div class="logo">
        <a href="../index.php">Web Portfolio <span>by Bobby Jonkman</span></a>
    </div>
    <div class="crud">
        <!-- If user is not logged in, don't show specific nav options. -->
        <?php
        if(!isset($_SESSION['loggedin']))
        {
            echo '<a href="../login_page.php">Register/Log in</a>
                     ';
        } else {
            echo '<a href="../includes/logout.php">Log Out</a>
                  <a href="../reset_pass_page.php">Reset Password</a>
                  <a href="../showdb_page.php">Show Database</a>
                 ';
        }// end of if-else.
        ?>
    </div>
</header>
