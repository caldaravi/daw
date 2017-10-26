<form  action="index.php" method="post">
        <label>
            <b>Usuario</b>
            <input type="text" placeholder="Usuario" name="username" required>
        </label>
        
        <label>
            <b>Contraseña</b>
            <input type="password" placeholder="Contraseña" name="password" required>
        </label>
        <div id="div_infologin">
            <input id="login" type="submit" value="Login">
            <label>
                <input type="checkbox" checked="checked"> Recordar
            </label>
            <a id="psw" href="registro/solicitudPass.php">Contraseña olvidada?</a>
        </div>
</form>