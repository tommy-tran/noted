<?php
    session_start();
    include('connection.php');
    
    // Check user inputs
    $missingUsername='<p><strong>Please enter a username!</strong></p>';
    $missingEmail='<p><strong>Please enter your email address!</strong></p>';
    $invalidEmail='<p><strong>Please enter a valid email address</strong></p>';
    $missingPassword='<p><strong>Please enter a password!</strong></p>';
    $missingPassword2='<p><strong>Please confirm your password!</strong></p>';
    $invalidPassword='<p><strong>Your password should be at least 5 characters long and include one capital letter and one number!</strong></p>';
    $differentPassword='<p><strong>Passwords don\'t match!</strong></p>';

    // Get Username
    if (empty($_POST["signup-username"])) {
        $errors .= $missingUsername;
    } else {
        $username = filter_var($_POST["signup-username"], FILTER_SANITIZE_STRING);
    }

    // Get Email
    if (empty($_POST["signup-email"])) {
        $errors .= $missingEmail;
    } else {
        $email = filter_var($_POST["signup-email"], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= $invalidEmail;
        }
    }

    // Get Password
    if (empty($_POST["signup-password"])) {
        $errors .= $missingPassword;
    } elseif (!(strlen($_POST["signup-password"])>=6
        and (preg_match('/[A-Z]/', $_POST["signup-password"])) 
        and (preg_match('/[0-9]/',$_POST["signup-password"]))
        )) {
            $errors .= $invalidPassword;
    } else {
        $password = filter_var($_POST["signup-password"], FILTER_SANITIZE_STRING);
        if (empty($_POST["signup-confirm"])) {
            $errors .= $missingPassword2;
        } else {
            $password2 = filter_var($_POST["signup-confirm"], FILTER_SANITIZE_STRING);
            if ($password !== $password2) {
                $errors .= $differentPassword;
            }
        }
    }

    if ($errors) {
        $resultMessage = '<div class="message-content">' . $errors . '</div>';
        echo $resultMessage;
        exit;
    }

    $username = mysqli_real_escape_string($link, $username);
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    // $password = md5($password); // 128 bits --> 32 chars
    $password = hash('sha256', $password);

    // Check if username exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="message-error">Error running the query</div>';
    }

    $results = mysqli_num_rows($result);

    if ($results) {
        echo '<div class="message-error">That username is already registered.</div>'; 
        // echo '<div class="message-content">' . mysqli_error($link) . '</div>'; 
        exit;
    }

    // Check if email exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="message-content">Error running the query</div>';
        // echo '<div class="modal-errormsg">' . mysqli_error($link) . '</div>';
        exit;
    }
    $results = mysqli_num_rows($result);

    if ($results) {
        // echo '<div class="message-error">' . mysqli_error($link) . '</div>';
        echo "<div class='message-content'>The email $email is already registered.</div>"; exit;
    }

    // Create a unique activation code
    $activationKey = bin2hex(openssl_random_pseudo_bytes(16));

    // Insert user details and activation code in the users table
    $sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationKey')";
    $result = mysqli_query($link, $sql);

    if (!$result) {
        echo '<div class="message-content">There was an error inserting user details into the database!</div>';
        exit;
    }

    // Activation email
    $message = "Please click on this link to activate your account:\n\n" . "https://noted.000webhostapp.com/activate.php?email=" . urlencode($email) . "&key=$activationKey";
    if (mail($email, 'Confirm your registration!', $message, 'From:'.'NOTED')) {
        echo "<div class='message-content'><p>Thank you for registering</p>A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
    }


?>