<?php
	require_once('controlAcceso.php');
    require_once('cabecera.inc');
?>

<body>
<header>
	
	<!-- / #logo-header -->
	<a id="h_logo" href=<?php echo $urlLocal.'index.php'?>>
		<img id="logo" src=<?php echo $urlLocal . "images/logo.png"?> alt="logo">
	</a>
	<div id="h_reg">
		<a href=<?php echo $urlLocal.'registro/nuevoReg.php'?>>Regístrate</a>
	</div>
	<div id="h_busq">
		<form action=<?php echo $urlLocal . "busqueda/formBusqueda.php"?> method="get">
			<label>
				<input type="text" placeholder="Busca fotos">
			</label>
			<input type="Submit" value="Buscar">
		</form>
	</div>

	<?php include_once($urlLocal . "includes/acceso.php");?>

	<!--	<a>
			<img id="loginimg" src="https://image.flaticon.com/icons/png/512/64/64572.png" alt="login icon">
		</a>
	-->
	
</header>