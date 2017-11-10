<?php 
    setcookie("username", $_SESSION['username'], time() + 365 * 24 * 60 * 60, "/daw");
    setcookie("hour", date('H:i:s'), time() + 365 * 24 * 60 * 60, "/daw");
    setcookie("day", date('d/m/Y'), time() + 365 * 24 * 60 * 60, "/daw");
?>