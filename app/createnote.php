<?php
session_start();
include('connection.php');

// Get user_id
$user_id = $_SESSION['user_id'];
// Get the current time
$time = time();
// Create note
$sql = "INSERT INTO notes (`user_id`, `note`, `time`) VALUES ('$user_id', '', '$time')";
$result = mysqli_query($link, $sql);

if (!$result) {
    echo 'error';
} else {
    // Return auto generated id used in last query
    echo mysqli_insert_id($link);
}

?>