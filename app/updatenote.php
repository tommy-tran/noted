<?php
session_start();
include ('connection.php');
// Get ID
$id = $_POST['id'];
// Get title
$title = $_POST['title'];
$title = mysqli_real_escape_string($link, $title);
// Get content
$note = $_POST['note'];
$note = mysqli_real_escape_string($link, $note);
// Get time
if (isset($_POST['time'])) {
    $time = $_POST['time'];
} else {
    $time = time();
}

// Update
$sql = "UPDATE notes SET title='$title', note='$note', time='$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo 'error';
}
?>