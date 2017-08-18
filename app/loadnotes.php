<?php
session_start();
include('connection.php');
echo "
<div class='notes__item'>
    <div class='notes__item-title'>This is a note</div>
    <div class='notes__item-date'>August 18, 2017 02:00:00</div>
</div>
<div class='notes__item'>
    <div class='notes__item-title'>This is another note</div>
    <div class='notes__item-date'>August 14, 2017 02:00:00</div>
</div>
<div class='notes__item'>
    <div class='notes__item-title'>This is the first note. The length of the title is pretty long so I don't really understand what I should do here.</div>
    <div class='notes__item-date'>August 12, 2017 02:00:00</div>
</div>
";
// Get user_id
$user_id = $SESSION['user_id'];
// Delete empty notes
$sql = "DELETE FROM notes WHERE note=''";
$result = mysqli_query($link, $sql);
// Get notes
// Show notes
?>