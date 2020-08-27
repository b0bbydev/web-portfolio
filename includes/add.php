<?php

/* This file is responsible for adding entries to the database. */

include_once('includes/connect.php');

if(isset($_POST['add']))
{
    // Preparing SQL stmt's.
    $stmt = $conn->prepare("INSERT INTO users (first_name, username) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['first_name'], $_POST['username']);
    $stmt->execute();

    // close the connection.
    $stmt->close();

}// end of if isset().
