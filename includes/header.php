<?php
	require_once('controlAcceso.php');
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
	
	<div id="h_reg">
		<a href=<?php echo $urlLocal.'registro/nuevoReg.php'?> class="button">Regístrate</a>
	</div>
	<div id="h_busq">
		<a href=<?php echo $urlLocal . "busqueda/formBusqueda.php"?> class="button">Buscar</a>
	</div>

	<?php include_once($urlLocal . "includes/acceso.php");?>

	<!--	<a>
			<img id="loginimg" src="https://image.flaticon.com/icons/png/512/64/64572.png" alt="login icon">
		</a>
	-->
	
</header>