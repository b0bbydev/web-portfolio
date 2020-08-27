<?php
include_once('connect.php');

$input = filter_input_array(INPUT_POST);

$first_name = mysqli_real_escape_string($conn, $input["first_name"]);
$username = mysqli_real_escape_string($conn, $input["username"]);

if($input["action"] === 'edit')
{
    $query = "UPDATE users SET first_name = '".$first_name."', username = '".$username."' WHERE id = '".$input["id"]."'";
    mysqli_query($conn, $query);
}// end of if.

if($input["action"] === 'delete')
{
    $query = "DELETE FROM users WHERE id = '".$input["id"]."'";
    mysqli_query($conn, $query);
}// end of if.

echo json_encode($input);
