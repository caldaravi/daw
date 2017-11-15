<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->  

<main>
    <div class="card">
        <h1>Perfil</h1>
        <p>Nombre: <?php echo $_SESSION['username']; ?> </p>
        <p>Apellidos: Pepito García</p>
        <p><a href="misAlbumes.php">Mis álbumes</a></p>
        <p><a href="addFoto.php">Añadir foto a álbum</a></p>
        <p><a href="crearAlbum.php">Crear álbum</a></p>
        <p><a href="solicitarAlbum.php">Solicitar álbum</a></p>
        <p><a href=<?php echo $urlLocal . 'sesion/salir.php'?>> Salir</a></p>
    </div>
</main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php");?>
<!-- FIN PÍE -->