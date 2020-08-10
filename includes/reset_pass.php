<?php
// Initialize the session.
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: ../login_page.php");
    exit;
}// end of if.


// Include connect file.
include_once('includes/connect.php');


// Define variables and initialize with empty values.
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";


// Processing form data when form is submitted.
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate new password.
    if(empty(trim($_POST["new_password"])))
    {
        $new_password_err = "Please enter the new password.";
    } elseif(strlen(trim($_POST["new_password"])) < 5)
    {
        $new_password_err = "Password must have at least 5 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }// end of if-else.


    // Validate confirm password.
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password))
        {
            $confirm_password_err = "Password did not match.";
        }// end of if.
    }// end of if-else.


    // Check input errors before updating the database.
    if(empty($new_password_err) && empty($confirm_password_err))
    {
        // Prepare an update statement.
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters.
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters.
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement.
            if(mysqli_stmt_execute($stmt))
            {
                // Password updated successfully. Destroy the session, and redirect to index page.
                session_destroy();
                header("location: ../index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }// end of if-else.

            // Close statement.
            mysqli_stmt_close($stmt);
        }// end of if.
    }// end of if.

    // Close connection.
    mysqli_close($conn);
}// end of if.