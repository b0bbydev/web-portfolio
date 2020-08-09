<?php
include_once('includes/connect.php');

// Initialize the session.
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: ../index.php");
    exit;
}// end of if.


// Define variables and initialize with empty values.
$username = $password = "";
$username_err = $password_err = "";


// Processing form data when form is submitted.
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Check if username is empty.
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }// end of if-else.

    // Check if password is empty.
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }// end of if-else.


    // Validate credentials.
    if(empty($username_err) && empty($password_err))
    {
        // Prepare a select statement.
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters.
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters.
            $param_username = $username;

            // Attempt to execute the prepared statement.
            if(mysqli_stmt_execute($stmt))
            {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password.
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    // Bind result variables.
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        // compare passwords with password_verify().
                        if(password_verify($password, $hashed_password))
                        {
                            // Password is correct, so start a new session.
                            //session_start();

                            // Store data in session variables.
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to index page if successful after 5 secs.
                            header("Refresh:5; url=../index.php");
                        } else {
                            // Display an error message if password is not valid.
                            $password_err = "The password you entered was not valid.";
                        }// end of if-else.
                    }// end of if.
                } else {
                    // Display an error message if username doesn't exist.
                    $username_err = "No account found with that username.";
                }// end of if-else.
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