
  <?php

    // comprobamos email
    if( isset($_POST["email"]) ){
        // Necesitamos que lo verifique siempre si se registra, pero no es obligatorio introducirlo si modifica datos:
        // Si el email esta introducido -->> registro
        if($_POST['email']==''){
            if($destinourl=='registro/nuevoReg.php') {
                error('El email está vacío.',$destinourl );
                //die dentro del error; si todo OK continua ejecucion
            } 
        }
        else{
            $email = $_POST["email"];
            setcookie("email", $_POST['email']);
            $domain = strstr($email, '@');
            $fulldom = strstr($domain, '.', true);
            $org = strrchr($email, '.');
            if(!comprobarlong($org,3,4)){
                error(' El email es incorrecto. El nombre de dominio debe estar comprendido entre 2 y 3 caracteres.',$destinourl );
                
            } 
            if(!comprobarlong($fulldom,3,5)){
                error(' El email es incorrecto. El dominio debe tener una longitud de entre 2 y 4 caracteres.',$destinourl );
            }
            
            $duplicatesEmail = "SELECT userEmail FROM usuarios WHERE userEmail = '".$email."'";
            $result2 = mysqli_query($connectDB, $duplicatesEmail);
            
            if (!$result2) {//no entra aqui, entra en usuario
                die(mysqli_error($connectDB));
            }
            else{
                $row_cnt = mysqli_num_rows($result2);
            }
            if ($row_cnt >= 1) {
                error('El email escogido ya está en uso.',$destinourl );
            }
        }
    }

    // Comprobamos ciudad
    if(isset($_POST["ciudad"])){
        $ciudad = $_POST['ciudad'];
        setcookie("ciudad", $_POST['ciudad']);
    }
    
    // Comprobamos paises
    if(isset($_POST["paises"])){
        // Tenemos el id del pais, pero necesitamos el nombre del pais
        $pais = $_POST['paises'];
        $querypais = "SELECT IdPais,NomPais FROM paises WHERE IdPais = '$pais'";
        $resultpaises = mysqli_query($connectDB, $querypais);

        if (!$resultpaises) {//no entra aqui, entra en usuario
            die(mysqli_error($connectDB));
        }
        else{
            $row_paises = mysqli_fetch_assoc($resultpaises);
        }
        

        $pais = $row_paises['NomPais'];

        setcookie("Pais", $pais);
    }
    if(isset($_POST["image"])){
        $image = $_POST['image'];
        setcookie("Foto", $_POST['image']);
    }   

    /*
    if( isset($_POST["contrasena"]) && isset($_POST["contrasena2"]) && isset($_POST["email"])){
        $pass1 = $_POST["contrasena"];
        $pass2 = $_POST["contrasena2"];
       
        if($pass1 == $pass2){
            $usuario = $_POST['usuario'] ;
            $email = $_POST["email"];
            
            $domain = strstr($email, '@');
            $fulldom = strstr($domain, '.', true);
            if(!comprobarlong($fulldom,3,5)){
                echo '        
                <div class="card">
                <p class="pCentrado">
                     El email es incorrecto. El dominio debe tener una longitud de entre 2 y 4 caracteres.
                </p>
                <div id="botones">
                    <a class="vBtn" href='. $urlLocal . 'registro/nuevoReg.php> Atrás </a>
                </div>
                </div>';
                die();
            }

            $duplicatesEmail = "SELECT userEmail FROM usuarios WHERE userEmail = '$email'";
            $result2 = mysqli_query($connectDB, $duplicatesEmail);
            
            if (!$result2) {//no entra aqui, entra en usuario
                die(mysqli_error($connectDB));
            }
            else{
                $row_cnt = mysqli_num_rows($result2);
            }
            if ($row_cnt >= 1) {
                 echo '        
                    <div class="card">
                    <p class="pCentrado">
                         El email escogido ya está en uso.
                    </p>
                    <div id="botones">
                        <a class="vBtn" href='. $urlLocal . 'registro/nuevoReg.php> Atrás </a>
                    </div>
                    </div>';
                die();
            }

            setcookie("contrasena", $_POST['contrasena']);
            setcookie("email", $_POST['email']);

            if(isset($_POST["ciudad"])){
                $ciudad = $_POST['ciudad'];
                setcookie("ciudad", $_POST['ciudad']);
            }
            if(isset($_POST["paises"])){
                // Tenemos el id del pais, pero necesitamos el nombre del pais
                $pais = $_POST['paises'];
                $querypais = "SELECT IdPais,NomPais FROM paises WHERE IdPais = '$pais'";
                $resultpaises = mysqli_query($connectDB, $querypais);

                if (!$resultpaises) {//no entra aqui, entra en usuario
                    die(mysqli_error($connectDB));
                }
                else{
                    $row_paises = mysqli_fetch_assoc($resultpaises);
                }
                mysqli_close($connectDB);

                $pais = $row_paises['NomPais'];

                setcookie("Pais", $pais);
            }
            if(isset($_POST["image"])){
                $image = $_POST['image'];
                setcookie("Foto", $_POST['image']);
            }
            success( $usuario, $email);
        }
        else{
            error();
        }
    }
    else{
        echo '        
        <div class="card">
        <p class="pCentrado">
            Contraseñas no coinciden.
        </p>
        <div id="botones">
            <a class="vBtn" href='. $urlLocal . 'registro/nuevoReg.php> Atrás </a>
        </div>
        </div>';
    die();
    }*/

    
    function success($usuario, $email){
        global $sexo;
        global $ciudad;
        global $pais;
        global $fecha;
        
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
            if(isset($_COOKIE['sexo'])){
                $sexo = $_COOKIE['sexo'];
            }
        }
        if($ciudad != null){
            echo "<p>Ciudad: <b>" . $ciudad . "</b></p>";
            if(isset($_COOKIE['ciudad'])){
                $ciudad = $_COOKIE['ciudad'];
            }
        }
        if($pais != null){
            echo "<p>País: <b>" . $pais . "</b></p>";
            if(isset($_COOKIE['Pais'])){
                $pais = $_COOKIE['Pais'];
            }
        }
        
        echo "
            <h3>¿Están todos los datos correctos?</h3>
                <a class='button' href='?reg=true'>Validar</a>
                <a class='button' href='nuevoReg.php'>Atrás</a>
        </div>";
    }

    

    ?>