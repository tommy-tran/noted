<?php
session_start();
include('connection.php');
// Get user_id
$user_id = $_SESSION['user_id'];
// Delete empty notes
$sql = "DELETE FROM notes WHERE note='' AND (title='' OR title='Title')";
$result = mysqli_query($link, $sql);

if (!$result) {
    echo '<div class="message-error">Error occurred while deleting empty notes</div>';
    exit;
}
// Get notes
$sql = "SELECT * FROM notes WHERE user_id='$user_id' ORDER BY time DESC";
// Show notes
if ($result = mysqli_query($link, $sql)) {
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            $note_id = $row['id'];
            $title = $row['title'];
            $note = $row['note'];
            $time = $row['time'];
            $time = date("F d, Y h:i:s A", $time);
            echo "
            <div class='notes__item' id='$note_id'>
                <div class='notes__item-title'>$title</div>
                <div class='notes__item-date'>$time</div>
                <div class='notes__item-note'>$note</div>
            </div>
            ";
        }
    }
} else {
    echo "<div class='message-error'>Error getting notes</div>";
    exit;
}

?>