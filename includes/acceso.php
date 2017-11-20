<form id="h_login" action=<?php echo $urlLocal . 'zonaPrivada/usuarioReg.php'?> method="POST">
       <div>
            <label>
                <input type="text" placeholder="Usuario" name="username" required>
            </label>
            <label>
                <input type="password" placeholder="Contraseña" name="password" required>
            </label>
            <input id="login" type="submit" value="Login">
        </div> 
        <div id="div_infologin">
            <label style="margin-right: 10px; font-size: 0.8em;">
                <input type="checkbox" checked="checked" name="recordar" >  Recordar
            </label>
            <a id="psw" href=<?php echo $urlLocal . "registro/solicitudPass.php" ?>>Contraseña olvidada?</a>
        </div>
</form>