<?php 
    session_start();
    if(isset($_COOKIE['username'])){
        require_once('cabecera.inc');
        ?>
        <div class="card">
            <p class="pCentrado">
        <?php
        echo "Hola " . $_COOKIE['username'] . ", su última visita fue el " . $_COOKIE['day'] . " a las " . $_COOKIE['hour'];
        ?>
        </p>
        <div id="botones">
            <a class="vBtn" href="?login=true">Acceder</a>
            <a class="vBtn" href="?logout=true">Salir</a>
        </div>
        </div>
        <?php
    }
    // LOGOUT

        if(isset($_GET['logout'])){
            setcookie('username', null, -1);
            header('location: /daw/index.php');
        }

        if(isset($_GET['login'])){
            $_POST['username'] = $_COOKIE['username'];
            $_POST['password'] = $_COOKIE['password'];
            
            if(($_POST['username'] == $usuario1 && $_POST['password'] == $pw1) || 
            ($_POST['username'] == $usuario2 && $_POST['password'] == $pw2) ||
            ($_POST['username'] == $usuario3 && $_POST['password'] == $pw3)){
                $_SESSION['username'] = $_POST['username'];
                header('location: /daw/usuarioReg.php');
            }
            else{
                header('location: /daw/index.php');
            }
        }
?>

