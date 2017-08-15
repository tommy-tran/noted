<?php
    session_start();
    include('connection.php');

    $missingEmail='<p><strong>Please enter your email address!</strong></p>';
    $invalidEmail='<p><strong>Please enter a valid email address</strong></p>';

    if (empty($_POST["forgot-email"])) {
        $errors .= $missingEmail;
    } else {
        $email = filter_var($_POST["forgot-email"], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= $invalidEmail;
        }
    }

    if ($errors) {
        $resultMessage = '<div class="message-content">' . $errors . '</div>';
        echo $resultMessage;
        exit;
    }

    $email = mysqli_real_escape_string($link, $email);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    if (!$result) {
        echo '<div class="message-content">Error running the query</div>';
        exit;
    }

    $count = mysqli_num_rows($result);
    if (!$count) {
        echo "<div class='message-content'>The email $email is already registered.</div>"; exit;
    }

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $user_id = $row['user_id'];

    $key = bin2hex(openssl_random_pseudo_bytes(16));
    $time = time();
    $status = 'pending';
    $sql = "INSERT INTO forgotpassword (`user_id`, `key`, `time`, `status`) VALUES ('$user_id', '$key', '$time', '$status')";
    
    $result = mysqli_query($link, $sql);

    if (!$result) {
        echo '<div class="message-content">There was an error inserting user details into the database!</div>';
        exit;
    }

    // Activation email
    $message = "Please click on this link to reset your password:\n\n" . "https://noted.000webhostapp.com/resetpassword.php?user_id=$user_id&key=$key";
    if (mail($email, 'Reset password', $message, 'From:'.'NOTED')) {
        echo "<div class='message-content'><p>An email has been sent to $email. Please click on the link to reset your password.</div>";
    }
    
?>