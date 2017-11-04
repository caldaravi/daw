<!-- CABECERA -->
<?php
	session_start();
	
	$zonaPrivada = false;
	
	require_once('sesion/sesion.php');
	require_once('db/connect.php');
?>
<!-- FIN CABECERA  ?> -->   
	<?php 
	/* ---- Base de datos temporal ---- */ 
	$fotos = array
	(
	array(1,"Buenas&nbsp;vistas","29/09/2017","Afganistan", "Pepe"),
	array(2,"Kite&nbsp;for&nbsp;life","17/06/2017","España", "Alberto"),
	array(3,"BOOM","08/04/2017","Perú","Paco"),
	array(4,"Good&nbsp;views","12/02/2017","Rio%20Janeiro","Alberto"),
	array(5,"Life&nbsp;style","03/01/2017","Bali","Andres"),
	);
	?>		
	<main>
	<!-- GALERIA DE IMAGENES -->
		<ul class="galeria">
			<li class="foto">
				
				<h2> <?php echo $fotos[0][1] ?> </h2>
				<a href="infIMG.php?id=1">
					<img src="images/mountain.jpg" alt="Imagen">
				</a>
				<p>
					<?php echo $fotos[0][2] ?>
				</p>
				<p>
					<?php echo $fotos[0][3] ?>
				</p>
				
			</li>
			<li class="foto">
				<h2> <?php echo $fotos[1][1] ?> </h2>
				<a href="infIMG.php?id=2">
					<img src="images/kite.jpg" alt="Imagen">
				</a>
				<p>
					<?php echo $fotos[1][2] ?>
				</p>
				<p>
					<?php echo $fotos[1][3] ?>
				</p>
				
			</li>
			<li class="foto">
				<h2> <?php echo $fotos[2][1] ?> </h2>
				<a href="infIMG.php?id=3">
					<img src="images/volcan.jpg" alt="Imagen">
				</a>
				<p>
					<?php echo $fotos[2][2] ?>
				</p>
				<p>
					<?php echo $fotos[2][3] ?>
				</p>
				
			</li>
			<li class="foto">

			<h2> <?php echo $fotos[3][1] ?> </h2>
				<a href="infIMG.php?id=4">
					<img src="images/caribe.jpg" alt="Imagen">
				</a>
				<p>
					<?php echo $fotos[3][2] ?>
				</p>
				<p>
					<?php echo $fotos[3][3] ?>
				</p>
				
			</li>
			<li class="foto">

			<h2> <?php echo $fotos[4][1] ?> </h2>
				<a href="infIMG.php?id=5">
					<img src="images/surf.jpg" alt="Imagen">
				</a>
				<p>
					<?php echo $fotos[4][2] ?>
				</p>
				<p>
					<?php echo $fotos[4][3] ?>
				</p>
				
			</li>
		</ul>
		
		
		<!-- FIN GALERIA -->
	</main>
	
<!-- PÍE DE PÁGINA -->
	<?php include_once("includes/pie.inc"); ?>
<!-- FIN PÍE -->