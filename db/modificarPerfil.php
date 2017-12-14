<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = false;
    $urlLocal = "../";
 
    //BORRAR cookies utilizadas para registro

    setcookie("usuario", "", time() - 3600, "/daw");
    setcookie("contrasena", "", time() - 3600, "/daw");
    setcookie("email", "", time() - 3600, "/daw");
    setcookie("sexo", "",time() - 3600, "/daw");
    setcookie("ciudad","", time() - 3600, "/daw");
    setcookie("FNacimiento","", time() - 3600, "/daw");
    setcookie("Foto","", time() - 3600, "/daw");
    setcookie("Pais","", time() - 3600, "/daw");

    require_once($urlLocal . 'db/connect.php');
    require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->  

    <main>
        <form class="card" action= <?php echo $urlLocal . "zonaPrivada/respuestaMisDatos.php" ?> method="POST" enctype="multipart/form-data">
                <h2>Modificar cuenta</h2>
                
                <!--nombre de usuario-->
                <!--contraseña-->
                <fieldset>
                <legend>Nueva contraseña</legend>
                    <p>
                    <label>Contraseña
                        <input type="password" name="contrasena" placeholder="Nueva contraseña">
                    </label>
                    </p>
                    <!--repetir contraseña-->
                    <p>
                    <label>Repetir contraseña
                        <input type="password" name="contrasena2" placeholder="Repite nueva contraseña">
                    </label>
                    </p>
                </fieldset>
                <!--dirección de email-->
                <p>
                <label>E-mail
                    <input type="email" name="email" placeholder="Nuevo e-mail">
                </label>
                </p>

                <!--ciudad-->
                <p>
                <label>Ciudad
                    <input type="text" name="ciudad" placeholder="Ciudad">
                </label>
                </p>
                <!--país de residencia-->
                
                <?php require_once($urlLocal . 'db/paises.php'); ?>

                <!--foto-->
                <fieldset>
                <legend>Foto</legend>
                <div>
                    <input name="image" type="file" accept="image/*" id="menu_images" />
                    <p><img id="menu_image" alt="Imagen de perfil" src="/" />
                    <!--<input type="submit" value="Upload" />--></p>
                </div>
                </fieldset>
                <p>
                    <input type="submit" name="doDB" value="Guardar">
                    <a href= <?php echo $urlLocal . "zonaPrivada/usuarioReg.php"?> class='button red'>Cancelar</a>
                </p>
        </form>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->
<?php
