<!-- ESTO NO VA, EL MISMO CÓDIGO EN HEADERLOGGED SI QUE VA -->
<?php 
    session_start();
    
    $_SESSION = array(); 
    setcookie('username', null, -1);
    setcookie('password', null, -1);
    setcookie("hour", null, -1);
    setcookie("day", null, -1);
    session_destroy();
    header('location: /daw/index.php');
?>