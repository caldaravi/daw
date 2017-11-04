<?php 
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
            header("location: /daw/sesion/salir.php");
        }

        if(isset($_GET['login'])){
            $_SESSION['username'] = $_COOKIE['username'];
            header('location: /daw/usuarioReg.php');
        }
?>

