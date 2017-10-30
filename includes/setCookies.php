<?php 
    setcookie("username", $_SESSION['username'], time() + 365 * 24 * 60 * 60);
    setcookie("password", $_POST['password'], time() + 365 * 24 * 60 * 60);
    setcookie("hour", date('H:i:s'), time() + 365 * 24 * 60 * 60);
    setcookie("day", date('d/m/Y'), time() + 365 * 24 * 60 * 60);
?>