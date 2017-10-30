<?php
    require_once('cabecera.inc');
?>
<body>
        <header class="b">
            <ul class="no-style b">
        
                <li class="b" id="logoLi">
                    <!-- / #logo-header -->
                    <a href="index.php">
                        <img id="logo" src="images/logo.png" alt="logo">
                    </a>
                </li>
        
                <li class="b" id="regLiLogged">
                    <a id="botonRegId" href="nuevoReg.php">Regístrate</a>
                </li>
            
                <li class="b" id="buscarLi">
                    <form action="formBusqueda.php" method="get">
                        <label>
                            <input type="text" placeholder="Busca fotos">
                        </label>
                        <input type="Submit" value="Buscar">
                    </form>
                    <p id="Bienvenido">Bienvenido  <?php echo $_SESSION['username'] ?> </p>
                </li>
                
                
                
                    <a href="?logout=true" class="iconosCabecera"> <img id="logoutIcon" src="images/logout.png" width="40px" style="float:right"> </a>
                    <a href="usuarioReg.php" class="iconosCabecera"> <img id="userIcon" src="images/user.png" style="width: 40px; height: 40px;float: right;"> </a>
                
                <li class="b" id="formregLiLogged">
                <?php require_once("includes/acceso.inc.php");?>
                </li>
            </ul>
        </header>

    <!--LOGOUT-->
<?php  
    if(isset($_GET['logout'])){
        $_SESSION = array(); 
        setcookie('username', null, -1);
        setcookie('password', null, -1);
        setcookie("hour", null, -1);
        setcookie("day", null, -1);
        session_destroy();
        header('location: index.php');
    }
?>