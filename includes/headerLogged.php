<?php
    require_once('cabecera.inc');
?>
<body>
    <header>
        
            <!-- / #logo-header -->
        <a id="h_logo" href=<?php echo $urlLocal.'index.php'?>>
            <img id="logo" src=<?php echo $urlLocal . "images/logo.png"?> alt="logo">
        </a>
        
        <div id="h_busq_logged">
            <form action=<?php echo $urlLocal . "busqueda/formBusqueda.php"?> method="get">
                <label>
                    <input type="text" placeholder="Busca fotos">
                </label>
                <input type="Submit" value="Buscar">
            </form>
        </div>
        <p id="h_bienvenido">Bienvenido <b><?php echo $_SESSION['username'] ?> </b></p>

        <div id="h_iconos">
            <a href=<?php echo $urlLocal . 'sesion/salir.php'?> class="iconosCabecera"> <img id="logoutIcon" src=<?php echo $urlLocal ."images/logout.png"?> alt="logout" width="40px" style="float:right"> </a>
            <a href=<?php echo $urlLocal . 'zonaPrivada/usuarioReg.php' ?> class="iconosCabecera"> <img id="userIcon" src=<?php echo $urlLocal ."images/user.png"?> alt="perfil" style="width: 40px; height: 40px;float: right;"> </a>
        </div>
        
            
    </header>