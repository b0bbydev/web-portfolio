<?php
include_once('includes/connect.php');
include_once('includes/add.php');
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
        <a href="crud.php">CRUD/Forms</a>
    </div>
</header>

<!-- Registration Form -->
<section id="about" class="wrapper post bg-img" data-bg="banner3.png">
    <div class="inner">
        <article class="box">
            <header>
                <h2>Register</h2>
            </header>
            <!-- Quick disclaimer stating to not provide any sensitive details to the form. -->
            <strong>
                <p>* DISCLAIMER *</p>
            </strong>
            <p>This form is purely for demonstration purposes only. Do NOT enter ANY sensitive information into the
                form. Some of the data is publicly displayed in the table below.</p>
            <!-- Start of Form_1 -->
            <form class="text" method="POST" name="form_1" id="form_1">
                <div>
                    <h5>First Name</h5>
                    <input type="text" name="first_name" class="form-control" pattern="[a-zA-Z]+"
                           title="Please enter letters only without any spaces." required>
                </div>
                <br>
                <div>
                    <h5>Last Name</h5>
                    <input type="text" name="last_name" class="form-control" pattern="[a-zA-Z]+"
                           title="Please enter letters only without any spaces." required>
                </div>
                <br>
                <div>
                    <h5>Gender</h5>
                    <select id="gender" name="gender" required>
                        <option disabled="disabled" selected="selected">Please select one...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <br>
                <input type="submit" name="add" value="Register User" id="add">
                <br>
                <br>
                <!-- SUCCESS messages for buttons -->
                <div class="success_message"><?php if (isset($_POST['add'])) {
                        echo '<script type="text/javascript">
                                                                                        Swal.fire({
                                                                                        icon: \'success\',
                                                                                        title: \'Great!\',
                                                                                        text: \'User was successfully added!\',
                                                                                        timer: 5000,
                                                                                        timerProgressBar: true,                                                 
                                                                                        })</script>';
                    } ?>
                </div>
                <div class="error_message"><?php if (isset($_POST['delete'])) {
                        echo '<script type="text/javascript">
                                                                                        Swal.fire({
                                                                                        icon: \'success\',
                                                                                        title: \'Great!\',
                                                                                        text: \'User was successfully deleted!\',
                                                                                        timer: 5000,
                                                                                        timerProgressBar: true,
                                                                                        })</script>';
                    } ?>
            </form>
</section>


<!-- Table -->
<section id="about" class="wrapper post bg-img" data-bg="banner2.png">
    <div class="inner">
        <article class="box">
            <header>
                <h2>Form Data</h2>
            </header>
            <div class="table-responsive">
                <table id="form_table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $query = "SELECT * FROM users";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                 <tr>
                                 <td>' . $row["id"] . '</td>
                                 <td>' . $row["first_name"] . '</td>
                                 <td>' . $row["last_name"] . '</td>
                                 <td>' . $row["gender"] . '</td>
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
