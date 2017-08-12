<?php
    session_start();
    include('connection.php');
    
    // Check user inputs
    $missingUsername='<p><strong>Please enter a username!</strong></p>';
    $missingEmail='<p><strong>Please enter your email address!</strong></p>';
    $invalidEmail='<p><strong>Please enter a valid email address</strong></p>';
    $missingPassword='<p><strong>Please enter a password!</strong></p>';
    $missingPassword='<p><strong>Please confirm your password!</strong></p>';
    $invalidPassword='<p><strong>Your password should be at least 5 characters long and include one capital letter and one number!</strong></p>';
    $differentPassword='<p><strong>Passwords don\'t match!</strong></p>';

    // Get Username
    if (isset($_POST["username"])) {
        $errors .= $missingUsername;
    } else {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    }

    // Get Email
    if (isset($_POST["email"])) {
        $errors .= $missingEmail;
    } else {
        $email = filter_var($POST["email"], FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= $invalidEmail;
        }
    }

    // Get Password
    if (isset($_POST["signup-password"])) {
        $errors .= $missingPassword;
    } elseif ((strlen($_POST["signup-password"]) > 6) and (preg_match('/[A-Z]/', $_POST["password"])) and (preg_match('/[0-9]/',$_POST["password"]))) {
        $errors .= $invalidPassword;
    } else {
        $password = filter_var($_POST["signup-password"], FILTER_SANITIZE_STRING);
        if (!isset($_POST["signup-confirm"])) {
            $errors .= $missingPassword2;
        } else {
            $password2 = filter_var($_POST["signup-confirm"], FILTER_SANITIZE_STRING);
            if ($password !== $password2) {
                $errors .= $differentPassword;
            }
        }
    }
?>