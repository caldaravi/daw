<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->  

<main>
    <div class="card" style="display: flex; flex-direction: column; align-items: center;">
        <h1>Perfil</h1>
        <p>Nombre: <?php echo $_SESSION['username']; ?> </p>
        <p>Apellidos: Pepito García</p>
        <p><a href=<?php echo $urlLocal . 'db/modificarPerfil.php'?> class="button">Modificar mis datos</a></p>
        <p><a href="misAlbumes.php" class="button">Mis álbumes</a></p>
        <p><a href="addFoto.php" class="button">Añadir foto a álbum</a></p>
        <p><a href="crearAlbum.php" class="button">Crear álbum</a></p>
        <p><a href="solicitarAlbum.php" class="button">Solicitar álbum</a></p>
        <p><a href=<?php echo $urlLocal . 'sesion/salir.php'?> class="button"> Salir</a></p>
        <br><br>
        <p><a class="button red" href=<?php echo $urlLocal . 'db/borrarPerfil.php'?>> Borrar cuenta</a></p>
    </div>
</main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php");?>
<!-- FIN PÍE -->