<form  action="index.php" method="post">
        <label>
            <b>Usuario</b>
            <input type="text" placeholder="Usuario" name="username" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];}?>" required>
        </label>
        
        <label>
            <b>Contraseña</b>
            <input type="password" placeholder="Contraseña" name="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}?>" required>
        </label>
        <div id="div_infologin">
            <input id="login" type="submit" value="Login">
            <label>
                <input type="checkbox" checked="checked" name="recordar" > Recordar
            </label>
            <a id="psw" href="solicitudPass.php">Contraseña olvidada?</a>
        </div>
</form>