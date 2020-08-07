<?php
include_once('connect.php');

$input = filter_input_array(INPUT_POST);

$first_name = mysqli_real_escape_string($conn, $input["first_name"]);
$last_name = mysqli_real_escape_string($conn, $input["last_name"]);
$gender = mysqli_real_escape_string($conn, $input["gender"]);

if($input["action"] === 'edit')
{
    $query = "UPDATE users SET first_name = '".$first_name."', last_name = '".$last_name."', gender = '".$gender."' WHERE id = '".$input["id"]."'";
    mysqli_query($conn, $query);
}// end of if.

if($input["action"] === 'delete')
{
    $query = "DELETE FROM users WHERE id = '".$input["id"]."'";
    mysqli_query($conn, $query);
}// end of if.

echo json_encode($input);
