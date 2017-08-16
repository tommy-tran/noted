<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="temp/styles/styles.css">
    <title>Password Reset</title>
  </head>
  <body>

    <div class="reset">
        <?php
            if (!isset($_GET['user_id']) || !isset($_GET['key'])) {
                echo "<div class='activate-msg'>There was an error. Please click the reset link you received by email.</div>";
                exit;
            }

            $user_id = $_GET['user_id'];
            $key = $_GET['key'];
            $time = time() - 86400;

            $user_id = mysqli_real_escape_string($link, $user_id);
            $key = mysqli_real_escape_string($link, $key);

            $sql = "SELECT user_id FROM forgotpassword WHERE key='$key' AND user_id='$user_id' AND time > $time";
            $result = mysqli_query($link, $sql);

            if (!$result) {
                echo '<div class="message-content">There was an error inserting user details into the database!</div>';
                exit;
            }

            $count = mysqli_num_rows($result);
            if ($count !== 1) {
                echo '<div class="message-error">Please try again</div>';
                exit;
            }


            if (mysqli_affected_rows($link) == 1) {
                echo "<div class='reset-msg'>Your account password has been reset.</div>";
                echo '<a href="index.php" type="button" class="button">Log in</a>';
            } else {
                echo '<div class="reset-msg">Your account password could not be reset. Please try again later.</div>';
                echo '<div class="reset-msg">' . mysqli_error($link) . '</div>';
            }
        ?>
    </div>
    
    
    <div class="jumbotron"></div>
  </body>
</html>