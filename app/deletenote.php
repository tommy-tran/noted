<?php
session_start();
include ('connection.php');
// Get ID of note
$note_id = $_POST['id'];
// Delete note
$sql = "DELETE FROM notes WHERE id='$note_id'";
$result = mysqli_query($link, $sql);

if (!$result) {
    echo 'error';
}
?>