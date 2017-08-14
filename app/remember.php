<?php
if (!isset($_SESSION['user_id']) && !empty($_COOKIE['rememberme'])) {
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

    $count = mysqli_num_rows($result);
    if ($count !== 1) {
        echo 'Remember me process failed!';
        exit;
    }

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if (hash_equals($row['f2authentificator2'], $f2authentificator2)) {
        $_SESSION['user_id'] = $row['user_id'];
    }
}
?>