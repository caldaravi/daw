<?php
    require_once('cabecera.inc');
?>
<body>
        <header class="b">
            <ul class="no-style b">
        
                <li class="b" id="logoLi">
                    <!-- / #logo-header -->
                    <a href=<?php echo $urlLocal.'index.php'?>>
                        <img id="logo" src=<?php echo $urlLocal . "images/logo.png"?> alt="logo">
                    </a>
                </li>
        
                <li class="b" id="regLiLogged">
                    <a id="botonRegId" href=<?php echo $urlLocal . "registro/nuevoReg.php"?>>Regístrate</a>
                </li>
            
                <li class="b" id="buscarLi">
                    <form action=<?php echo $urlLocal . "busqueda/formBusqueda.php"?> method="get">
                        <label>
                            <input type="text" placeholder="Busca fotos">
                        </label>
                        <input type="Submit" value="Buscar">
                    </form>
                    <p id="Bienvenido">Bienvenido  <?php echo $_SESSION['username'] ?> </p>
                </li>
                
                    <a href=<?php echo $urlLocal . 'sesion/salir.php'?> class="iconosCabecera"> <img id="logoutIcon" src=<?php echo $urlLocal ."images/logout.png"?> alt="logout" width="40px" style="float:right"> </a>
                    <a href=<?php echo $urlLocal . 'zonaPrivada/usuarioReg.php' ?> class="iconosCabecera"> <img id="userIcon" src=<?php echo $urlLocal ."images/user.png"?> alt="perfil" style="width: 40px; height: 40px;float: right;"> </a>
                
                <li class="b" id="formregLiLogged">
                <?php require_once($urlLocal . 'includes/acceso.php');?>
                </li>
            </ul>
        </header>