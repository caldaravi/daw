<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = false;
    $urlLocal = "../";
    
    require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->
<main>
    <?php 
    
    if( isset($_POST["contrasena"]) && isset($_POST["contrasena2"]) && isset($_POST["usuario"]) && isset($_POST["email"])){
        $pass1 = $_POST["contrasena"];
        $pass2 = $_POST["contrasena2"];
        $sexo;
        $fecha;
        $ciudad;
        $pais;
        
        if($pass1 == $pass2){
            $usuario = $_POST['usuario'] ;
            $email = $_POST["email"];
            setcookie("usuario", $_POST['usuario']);
            setcookie("contrasena", $_POST['contrasena']);
            setcookie("email", $_POST['email']);

            if(isset($_POST["sexo"])){
                $sexo = $_POST["sexo"];
                setcookie("sexo", $_POST['sexo']);
            }
            if(isset($_POST["ciudad"])){
                $ciudad = $_POST['ciudad'];
                setcookie("ciudad", $_POST['ciudad']);
            }
            if(isset($_POST["fecnacimiento"])){
                $fecha = $_POST['fecnacimiento'];
                setcookie("fecnacimiento", $_POST['fecnacimiento']);
            }
            if(isset($_POST["paises"])){
                $pais = $_POST['paises'];
                setcookie("paises", $_POST['paises']);
            }
            if(isset($_POST["image"])){
                $image = $_POST['image'];
                setcookie("image", $_POST['image']);
            }
            success( $usuario, $email, $sexo, $ciudad, $fecha, $pais);
        }
        else{
            error();
        }
    }

    function success( $usuario, $email, $sexo, $ciudad, $fecha, $pais){
        echo "
        <div class='card'>
            <h2>Datos del nuevo registro</h2>
                <p>Usuario: <b>" . $usuario . "</b></p>
                <p>Email: <b>" . $email . "</b></p>";

        if($fecha != null){
            echo "<p>Fecha de nacimiento: <b>" . $fecha . "</b></p>";
        }
        if($sexo != null){
            echo "<p>Sexo: <b>" . $sexo . "</b></p>";
        }
        if($ciudad != null){
            echo "<p>Ciudad: <b>" . $ciudad . "</b></p>";
        }
        if($pais != null){
            echo "<p>País: <b>" . $pais . "</b></p>";
        }
        echo "
            <h3>¿Están todos los datos correctos?</h3>
                <a class='btn' href='?reg=true'>Validar</a>
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
<!-- PÍE DE PÁGINA -->
<?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->
<?php
if(isset($_GET['reg'])){
    header("location: registroOK.php");
}