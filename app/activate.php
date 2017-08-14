<?php
//The user is re-directed to this file after clicking the activation link
//Signup link contains two GET parameters: email and activation key
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
    <title>Account Activation</title>
  </head>
  <body>

    <div class="activate">
        <?php
            if (!isset($_GET['email']) || !isset($_GET['key'])) {
                echo "<div class='activate-msg'>There was an error. Please click the activation link you received by email.</div>";
                exit;
            }

            $email = $_GET['email'];
            $key = $_GET['key'];

            $email = mysqli_real_escape_string($link, $email);
            $key = mysqli_real_escape_string($link, $key);

            $sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
            $result = mysqli_query($link, $sql);

            if (mysqli_affected_rows($link) == 1) {
                echo "<div class='activate-msg'>Your account has been activated.</div>";
                echo '<a href="index.php" type="button" class="button">Log in</a>';
            } else {
                echo '<div class="activate-msg">Your account could not be activated. Please try again later.</div>';
                echo '<div class="activate-msg">' . mysqli_error($link) . '</div>';
            }
        ?>
    </div>
    
    
    <div class="jumbotron"></div>
  </body>
</html>