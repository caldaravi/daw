<!-- ESTO NO VA, EL MISMO CÓDIGO EN HEADERLOGGED SI QUE VA -->
<?php 
    session_start();
    
    unset($_COOKIE['username']);
    setcookie('username', null, -1);
    unset($_SESSION['username']);
    session_destroy();
    header('location: /daw/index.php');
?>