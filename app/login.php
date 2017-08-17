<?php
    session_start();
    include("connection.php");

    // Error messages
    $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
    $missingPassword = '<p><strong>Please enter your password!</strong></p>';

    // Check for missing email or password
    if (empty($_POST["login-email"])) {
        $errors .= $missingEmail;
    } else {
        $email = filter_var($_POST["login-email"], FILTER_SANITIZE_EMAIL);
    }

    if (empty($_POST["login-password"])) {
        $errors .= $missingPassword;
    } else {
        $password = filter_var($_POST["login-password"], FILTER_SANITIZE_STRING);
    }

    if ($errors) {
        $resultMessage = '<div class="message-content">' . $errors . '</div>';
        echo $resultMessage;
        exit;
    } else {
        $email = mysqli_real_escape_string($link, $email);
        $password = mysqli_real_escape_string($link, $password);
        $password = hash('sha256', $password);

        // Check if user exists
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND activation='activated'";
        $result = mysqli_query($link, $sql);

        // Check query result
        if (!$result) {
            echo '<div class="message-error">Error running the query</div>';
            // echo '<div class="modal-errormsg">' . mysqli_error($link) . '</div>'; 
        }

        $count = mysqli_num_rows($result);

        if ($count !== 1) {
            echo '<div class="message-error"><p>Wrong email or password</p></div>';
        } else {
            // Set session variables
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['username']=$row['username'];
            $_SESSION['email']=$row['email'];

            if (empty($_POST['rememberme'])) {
                // If remember me is not checked
                echo "success";
            } else {
                // Authentificators (random values for authentification)
                $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10)); // Hex
                $authentificator2 = openssl_random_pseudo_bytes(20); // Binary

                function combiner($a, $b) {
                    $value = $a . "," . bin2hex($b);
                    return $value;
                }

                $cookieValue = combiner($authentificator1, $authentificator2);
                
                // Store as a cookie
                setcookie(
                    "rememberme",
                    $cookieValue,
                    time() + 1296000 
                );

                function reverser($x) {
                    $value = hash('sha256', $x);
                    return $value;
                }

                $f2authentificator2 = reverser($authentificator2);
                $user_id = $_SESSION['user_id'];
                $expires = date('Y-m-d H:i:s', time() + 1296000);
                
                $sql = "INSERT INTO rememberme 
                (`authentificator1`, `f2authentificator2`, `user_id`, `expires`)
                VALUES 
                ('$authentificator1', '$f2authentificator2', '$user_id', '$expires')";
                
                $result = mysqli_query($link, $sql);

                if (!$result) {
                    $output = mysqli_error($link);
                    echo $output;
                } else {
                    echo 'success';
                }
            }
        }
    }
?>