<?php
include_once('includes/connect.php');

// initialize the session.
session_start();
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
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link to AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Bootstrap 3 - had issues with TableEdit plugin with Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <!-- link to css file. -->
    <link rel="stylesheet" href="assets/css/styles.css"/>
    <!-- SweetAlert -->
    <link rel="stylesheet" href="assets/css/theme-dark/dark.css">
    <script src="assets/css/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.tabledit.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</head>


<body>
<!-- Header -->
<header id="header">
    <div class="logo">
        <a href="index.php">Web Portfolio <span>by Bobby Jonkman</span></a>
    </div>

    <div class="crud">
        <!-- If user is not logged in, don't show specific nav options. -->
        <?php
        if(!isset($_SESSION['loggedin']))
        {
            echo '<a href="login_page.php">Register/Log in</a>
                     ';
        } else {
            echo '<a href="includes/logout.php">Log Out</a>
                     ';
        }// end of if-else.
        ?>
        <!-- Always show the database page. -->
        <a href="showdb_page.php">Show Database</a>
    </div>
</header>

<!-- Table -->
<section id="about" class="wrapper post bg-img" data-bg="banner2.png">
    <div class="inner">
        <article class="box">
            <header>
                <h2>Show Database</h2>
            </header>
            <div class="table-responsive">
                <table id="form_table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Username</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $query = "SELECT * FROM users ORDER BY id";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                 <tr>
                                 <td>' . $row["id"] . '</td>
                                 <td>' . $row["first_name"] . '</td>
                                 <td>' . $row["username"] . '</td>
                                 </tr>
                                 ';
                    }// end of while
                    ?>
                    </tbody>
                </table>
            </div>
        </article>
    </div>
</section>
</body>
</html>

<script>
    // Ajax function to show values in table.
    $(document).ready(function () {
        $('#form_table').Tabledit({
            url: 'includes/action.php',
            columns: {
                identifier: [0, "id"],
                editable: [[1, 'first_name'], [2, 'last_name'], [3, 'gender']]
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR) {
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                }// end of if.
            }
        });
    });
</script>
