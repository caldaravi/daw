<!-- CABECERA -->
<?php
    require('includes/cabecera.inc');
    require('includes/controlAcceso.php');
?>
<!-- FIN CABECERA  ?> -->
<main>
    <?php 
        if( isset($_POST["contrasena"]) && isset($_POST["contrasena2"]) && isset($_POST["usuario"]) && isset($_POST["email"]) && isset($_POST["sexo"]) && isset($_POST["ciudad"]) ){
            $pass1 = $_POST["contrasena"];
            $pass2 = $_POST["contrasena2"];
            $usuario = $_POST['usuario'] ;
            $email = $_POST["email"];
            $sexo = $_POST["sexo"];
            $ciudad = $_POST['ciudad'];
        }

        if( isset($pass1) && isset($pass2) ){
            if( $pass1 == $pass2)
                success( $usuario, $email, $sexo, $ciudad );
            else
                error();
        }

        function success( $usuario, $email, $sexo, $ciudad ){
            echo "<div class='card'>
            <h2>Datos del nuevo registro</h2>
            <p>Usuario: <b>" . $usuario . "</b></p>
            <p>Email: <b>" . $email . "</b></p>
            <p>Sexo: <b>" . $sexo . 
            "</b>
            </p>
            <p>Ciudad: <b>" . $ciudad . "</b></p>
            <h3>¿Están todos los datos correctos?</h3>
            <a class='btn' href='index.php'>Validar</a>
            <a class='btn' href='nuevoReg.php'>Atrás</a>
        </div>";
        }
        function error(){
            echo '<div class="card">
                <p>Error: contraseñas no coinciden.</p>
                <a class="btn" href="nuevoReg.php">Atrás</a>
            </div>';
        }
    ?>
    
</main>
<!-- PÍE DE PÁGINA -->
<?php require("includes/pie.inc"); ?>
<!-- FIN PÍE -->

