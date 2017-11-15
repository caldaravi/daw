<?php 
    require_once($urlLocal . 'db/connect.php');
    

    if(isset($_POST['username'])){
        $query = "SELECT * FROM usuarios WHERE userName = '" . mysqli_real_escape_string($connectDB, $_POST['username']) ."' 
                        AND userPass = '" . mysqli_real_escape_string($connectDB, $_POST['password']) ."'" ;
        $result = mysqli_query($connectDB, $query);
        if (!$result) {
            die(mysqli_error($connectDB));
        }
        else{
            $row_cnt = mysqli_num_rows($result);
        }
        if ($row_cnt == 1) {
        //Pass
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['autentificado'] = true;
            if(!empty($_POST['recordar'])){
                require_once('setCookies.php');
            }
            require_once($urlLocal . 'includes/headerLogged.php');
            header("location: " . $urlLocal . "zonaPrivada/usuarioReg.php");
        } else {
        //Fail
            echo '<p style="float: right;"> El usuario o contraseña es incorrecto. </p>';
            //header("location: " . $urlLocal . "index.php");        
        }
        mysqli_close($connectDB);
    }
?>