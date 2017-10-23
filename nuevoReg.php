<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="generator" content="Bloc de notas" />
    <meta name="author" content="Carlos y Marcos" />
    <meta name="keywords" content="HTML5, web" />
    <meta name="description" content="Practica DAW" />
    <title>PI - Pictures & Images</title>
    <link rel = "stylesheet" type = "text/css" href = "css/estilo.css" />
</head>

<body>
    <!-- CABECERA -->
        <?php include("includes/header.html"); ?>
    <!-- FIN CABECERA -->   
<main style="display: flex;">
    
    <form class="card" action="usuarioReg.php" method="POST">
            <p>* Campos obligatorios</p>
            <!--nombre de usuario-->
            <label>Usuario
                <input type="text" name="usuario" required>*
            </label>
            <!--contraseña-->
            <label>Contraseña
                <input type="password" name="contrasena" required>*
            </label>
            
            <!--repetir contraseña-->
            <label>Repetir contraseña
                <input type="password" name="contrasena2" required>*
            </label>
            <!--dirección de email-->
            <label>E-mail
                <input type="email" name="email" required placeholder="Enter your e-mail">*
            </label>
            
            <!--Sexo-->
            Sexo
            <input type="radio" name="sexo" id="male" value="hombre">
                <label for="male">Hombre</label>
            <input type="radio" name="sexo" id="female" value="mujer">
                <label for="female">Mujer</label>
            <!--fecha de nacimiento-->
            <label>Fecha de nacimiento
                <input type="date" name="fecnacimiento">
            </label>
            <!--ciudad-->
            <label>Ciudad
                <input type="text" name="ciudad">
            </label>
            
            <!--país de residencia-->
            <label>País de residencia
                    <input type="text" name="paisresi">
            </label>
            <!--foto-->
            Foto


            <div class="col-sm-8 img-upload-section">
                <input name="image3" type="file" accept="image/*" id="menu_images" />
                <img id="menu_image" alt="Imagen de perfil" src="/" />
                <input type="submit" value="Upload" />
            </div>

            <input type="submit" value="Enviar">

    </form>
</main>

	<!-- PÍE DE PÁGINA -->
        <?php include("includes/footer.html"); ?>
	<!-- FIN PÍE -->

</body>

</html>