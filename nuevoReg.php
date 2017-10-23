<!-- CABECERA -->
    <?php require("includes/header.html"); ?>
<!-- FIN CABECERA -->   

    <main>
        <form class="card" action="usuarioReg.php" method="POST">
                <p>* Campos obligatorios</p>
                <!--nombre de usuario-->
                <p><label>Usuario
                    <input type="text" name="usuario" required>*
                </label>
                </p>
                <!--contraseña-->
                <p>
                <label>Contraseña
                    <input type="password" name="contrasena" required>*
                </label>
                </p>
                <!--repetir contraseña-->
                <p>
                <label>Repetir contraseña
                    <input type="password" name="contrasena2" required>*
                </label>
                </p>
                <!--dirección de email-->
                <p>
                <label>E-mail
                    <input type="email" name="email" required placeholder="Enter your e-mail">*
                </label>
                </p>
                
                <!--Sexo-->
                
                <fieldset>
                <legend>Sexo</legend>
                <p><input type="radio" name="sexo" id="male" value="hombre">
                    <label for="male">Hombre</label></p>
                <p><input type="radio" name="sexo" id="female" value="mujer">
                    <label for="female">Mujer</label></p>
                </fieldset>
                <!--fecha de nacimiento-->
                <p>
                <label>Fecha de nacimiento
                    <input type="date" name="fecnacimiento">
                </label>
                </p>
                <!--ciudad-->
                <p>
                <label>Ciudad
                    <input type="text" name="ciudad">
                </label>
                </p>
                <!--país de residencia-->
                <p>
                <label>País de residencia
                        <input type="text" name="paisresi">
                </label>
                </p>
                <!--foto-->
                <fieldset>
                <legend>Foto</legend>
                <div>
                    <input name="image3" type="file" accept="image/*" id="menu_images" />
                    <p><img id="menu_image" alt="Imagen de perfil" src="/" />
                    <input type="submit" value="Upload" /></p>
                </div>
                <p>
                </fieldset>
                <input type="submit" value="Enviar"></p>
        </form>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->