<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');
?>
<!-- FIN CABECERA  ?> -->  

<main>
    <div class="card">
        <h1>Eliminación de cuenta</h1>
        <p>¿Estás seguro de que deseas eliminar tú cuenta? Esta acción es irreversible</p>
        <div id="botones">
            <a class="button" href="?enter=true">Borrar</a>
            <a class="button red" href=<?php echo $urlLocal . 'zonaPrivada/usuarioReg.php'?>>Cancelar</a>
        </div>
    </div>
</main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php");?>
<!-- FIN PÍE -->
<?php
if(isset($_GET['enter'])){
        
    if($connectDB){
        $user = $_SESSION['username'];
        $sentencia = 
        "DELETE FROM usuarios WHERE userName = '$user'";

        if ($connectDB->query($sentencia) === TRUE) {
            setcookie('username', null, -1, "/daw");
            setcookie("hour", null, -1, "/daw");
            setcookie("day", null, -1, "/daw");
            session_destroy();
            header("Location: " . $urlLocal . "db/borrarPerfilOK.php");
        } else {
            echo "Error deleting record: " . $connectDB->error;
        }
    }
}
?>