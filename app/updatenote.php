<?php
session_start();
include ('connection.php');
// Get ID
$id = $_POST['id'];
// Get title
$title = $_POST['title'];
// Get content
$note = $_POST['note'];
// Get time
$time = time();
// Update
$sql = "UPDATE notes SET title='$title', note='$note', time='$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo 'error';
}
?>