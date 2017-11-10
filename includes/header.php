<?php
	require_once('controlAcceso.php');
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

		<li class="b" id="regLi">
			<a id="botonRegId" href=<?php echo $urlLocal.'registro/nuevoReg.php'?>>Regístrate</a>
		</li>

		<li class="b" id="buscarLi">
			<form action=<?php echo $urlLocal . "busqueda/formBusqueda.php"?> method="get">
				<label>
					<input type="text" placeholder="Busca fotos">
				</label>
				<input type="Submit" value="Buscar">
			</form>
		</li>

		<li class="b" id="formregLi">
			<?php include_once($urlLocal . "includes/acceso.php");?>
		</li>
		
		<li id="loginicon">
				<a>
					<img id="loginimg" src="https://image.flaticon.com/icons/png/512/64/64572.png" alt="login icon">
				</a>
		</li>
	</ul>
</header>