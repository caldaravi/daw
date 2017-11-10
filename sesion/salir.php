<?php 
    session_start();

    $urlLocal = "../";

    setcookie('username', null, -1, "/daw");
    setcookie("hour", null, -1, "/daw");
    setcookie("day", null, -1, "/daw");
    session_destroy();
    header('Location: ' . $urlLocal . 'index.php');
?>