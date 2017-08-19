<?php
if (!empty($_COOKIE['rememberme'])){
    // Extract authentificators from cookie
    list($authentificator1,$authentificator2) = explode(',', $_COOKIE['rememberme']);
    $authentificator2 = hex2bin($authentificator2);
    $f2authentificator2 = hash('sha256', $authentificator2);

    $sql = "SELECT * FROM rememberme where authentificator1 = '$authentificator1'";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo mysqli_error($link);
        exit;
    }

    // $count = mysqli_num_rows($result);
    // if ($count !== 1) {
    //     echo "<div class='message-alert'>Remember me process failed!</div>";
    // }

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if (hash_equals($row['f2authentificator2'], $f2authentificator2)) {
        // Passed auth2
        // Set session variables
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['username']=$row['username'];


        // Generate new authentificators
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
        }

        // Log the user in and redirect to notes page
        header("location:main.php");
    }
}
?>