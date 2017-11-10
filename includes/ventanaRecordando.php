<?php 
    //session_start();

    $urlLocal = "../";

    if(isset($_COOKIE['username'])){
        require_once($urlLocal . 'includes/cabecera.inc');
?>
        <div class="card">
            <p class="pCentrado">
                <?php echo "Hola " . $_COOKIE['username'] . ", su última visita fue el " . $_COOKIE['day'] . " a las " . $_COOKIE['hour']; ?>
            </p>
            <div id="botones">
                <a class="vBtn" href="?enter=true">Acceder</a>
                <a class="vBtn" href=<?php echo $urlLocal . 'sesion/salir.php'?>>Salir</a>
            </div>
        </div>
    <?php
    }

    if(isset($_GET['enter'])){
        session_start();
        $_SESSION['username'] = $_COOKIE['username'];
        header('location: ' . $urlLocal . 'zonaPrivada/usuarioReg.php');
    }
    ?>