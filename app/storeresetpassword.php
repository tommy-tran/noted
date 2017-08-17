<?php
    session_start();
    include('connection.php');
    if (!isset($_POST['user_id']) || !isset($_POST['key'])) {
        echo "<div class='activate-msg'>There was an error. Please click the reset link you received by email.</div>";
        exit;
    }

    $user_id = $_POST['user_id'];
    $key = $_POST['key'];
    $time = time() - 86400;

    $user_id = mysqli_real_escape_string($link, $user_id);
    $key = mysqli_real_escape_string($link, $key);

    $sql = "SELECT user_id FROM forgotpassword WHERE resetkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
    $result = mysqli_query($link, $sql);

    if (!$result) {
        echo '<div class="message-content">There was an error inserting user details into the database!</div>';
        exit;
    }

    $count = mysqli_num_rows($result);
    if ($count !== 1) {
        echo '<div class="message-error">Error while trying to reset password, please try again.</div>';
        exit;
    }

    // Error messages
    $missingPassword='<p><strong>Please enter a password!</strong></p>';
    $missingPassword2='<p><strong>Please confirm your password!</strong></p>';
    $invalidPassword='<p><strong>Your password should be at least 5 characters long and include one capital letter and one number!</strong></p>';
    $differentPassword='<p><strong>Passwords don\'t match!</strong></p>';

    // Get password
    if (empty($_POST["password"])) {
        $errors .= $missingPassword;
    } elseif (!(strlen($_POST["password"])>=6
        and (preg_match('/[A-Z]/', $_POST["password"])) 
        and (preg_match('/[0-9]/',$_POST["password"]))
        )) {
            $errors .= $invalidPassword;
    } else {
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        if (empty($_POST["password-confirm"])) {
            $errors .= $missingPassword2;
        } else {
            $password2 = filter_var($_POST["password-confirm"], FILTER_SANITIZE_STRING);
            if ($password !== $password2) {
                $errors .= $differentPassword;
            }
        }
    }
    if ($errors) {
        $resultMessage = '<div class="message-error">' . $errors .'</div>';
        echo $resultMessage;
        exit;
    }   

    // Prepare variables for query
    $password = mysqli_real_escape_string($link, $password);
    $password = hash('sha256', $password);
    $user_id = mysqli_real_escape_string($link, $password);

    // Run Query
    $sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
    $result = mysqli_query($link, $sql);
    
    if (!$result) {
        echo '<div class="message-error">Problem resetting password.</div>';
        exit;
    }

    // Change key status
    $sql = "UPDATE forgotpassword SET status='used' WHERE resetkey='$key' AND user_id='$user_id'";
    $result = mysqli_query($link, $sql);
    
    if (!$result) {
        echo '<div class="message-error">Problem running reset password query.</div>';
        exit;
    } else {
        echo "<div class='message-content'><p>Your password has been updated successfully.</p></div>";
        echo '<a href="index.php" class="message-link">Log in</a>';
    }
    
?>