<?php
if(isset($_SESSION['user_id'])&&$_GET['logout']==1){
    setcookie("rememberme", '', 1, '/');    
    $_COOKIE['rememberme'] = "";
    session_destroy();
}
?>