<?php
    // Connect to database
    $link = mysqli_connect("localhost", "id2539743_admin", "password", "id2539743_noted");

    if (mysqli_connect_error()) {
        die("ERROR: Unable to connect: " . mysqli_connect_error());
    }
?>