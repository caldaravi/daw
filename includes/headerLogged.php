<?php
    require_once('cabecera.inc');
?>
<body>
    <header>
        
            <!-- / #logo-header -->
        <div id="h_logo">
            <a href=<?php echo $urlLocal.'index.php'?>>
                <img id="logo" src=<?php echo $urlLocal . "images/logo.png"?> alt="logo">
            </a>
        </div>
        <p id="h_bienvenido"><a style='text-color: black;' href='<?php echo $urlLocal . "zonaPrivada/usuarioReg.php" ?> '>Bienvenido <b><?php echo $_SESSION['username'] ?> </b></a></p>

        <div id="h_iconos">
            <a href=<?php echo $urlLocal . 'sesion/salir.php'?> class="iconosCabecera" style="margin-right: 10px;"> <img id="logoutIcon" src=<?php echo $urlLocal ."images/logout.png"?> alt="logout" width="40px" style="float:right"> </a>
            <a href=<?php echo $urlLocal . 'zonaPrivada/usuarioReg.php' ?> class="iconosCabecera" style="margin-right: 10px;"> <img id="userIcon" src=<?php echo $urlLocal ."images/user.png"?> alt="perfil" style="width: 40px; height: 40px;float: right;"> </a>
		    <a href=<?php echo $urlLocal . "busqueda/formBusqueda.php"?> class="button" style="float:right; margin-right: 10px;">Buscar</a>
        </div>
        
            
    </header>