<?php 
    session_start();
    
    if(isset($_COOKIE['username'])){
        unset($_COOKIE['username']);
        setcookie('username', null, -1, '/');
	}
    unset($_SESSION['username']);
    session_destroy();
    header('location: /daw/index.php');
?>