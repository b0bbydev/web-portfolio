<?php
include_once('includes/connect.php');

/* This file is responsible for handling account registration. */

// initialize variables.
$first_name = $username = $password = $confirm_password = "";
$first_name_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted.
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // make sure first name isn't empty - if it's valid set it as a param for binding.
    if(empty(trim($_POST["first_name"])))
    {
        $first_name_err = "Error! Please enter a first name";
    } else {
        $param_first_name = $first_name = $_POST["first_name"];
    }// end of if-else.

    // make sure username isn't empty - if it isn't, compare to other usernames in database to make sure their are not duplicates.
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Error! Please enter a username.";
    } else {
        // Check if username already exits.
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters.
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters.
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement.
            if(mysqli_stmt_execute($stmt))
            {
                /* store result */
                mysqli_stmt_store_result($stmt);

                // make sure there isn't duplicate usernames.
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }// end of if-else.

            // Close statement.
            mysqli_stmt_close($stmt);
        }// end of if.
    }// end of if-else.


    // Validate password.
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Error! Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 5) {
        $password_err = "Error! Password must have at least 5 characters.";
    } else {
        $password = trim($_POST["password"]);
    }// end of if-else.


    // Make sure confirm password isn't empty and matches password.
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Error! Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Error! Password did not match.";
        }// end of if.
    }// end of if-else.


    // Check input errors before inserting in database.
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
    {
        // Prepare an insert statement.
        $sql = "INSERT INTO users (first_name, username, password) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters.
            mysqli_stmt_bind_param($stmt, "sss", $param_first_name,$param_username, $param_password);

            // Set parameters.
            $param_username = $username;
            // Creates a password hash.
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // Attempt to execute the prepared statement.
            if(mysqli_stmt_execute($stmt))
            {
                // Redirect to login page
                header("Location: ../index.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }// end if-else.

            // Close statement
            mysqli_stmt_close($stmt);
        }// end of if.
    }// end of if.

    // Close connection
    mysqli_close($conn);
}// end of if.
