<!-- CABECERA -->
<?php
	require('includes/cabecera.inc');
	require('includes/controlAcceso.php');
	echo($_SERVER['SCRIPT_URI']);
?>
<!-- FIN CABECERA  ?> -->   
    			
	<main>
	<!-- GALERIA DE IMAGENES -->
		<ul class="galeria">
			<li class="foto">
				<?php 
				$titulo1="Buenas&nbsp;vistas";
				$fecha1="29/09/2017";
				$pais1="Afganistan";
				$usuario1="Pepe";
				
				echo '<h2>' . $titulo1 . '</h2>
				<a href="infIMG.php?fecha='.$fecha1.'&pais='.$pais1.'&titulo='.$titulo1.'&usuario='.$usuario1.'">
					<img src="images/mountain.jpg" alt="Imagen">
				</a>
				<p>
					'. $fecha1 .'
				</p>
				<p>
					' . $pais1 . '
				</p>'
				?>
			</li>
			<li class="foto">
			<?php 
				$titulo2="Kite&nbsp;for&nbsp;life";
				$fecha2="17/06/2017";
				$pais2="España";
				$usuario2="Alberto";
				
				echo '<h2>' . $titulo2 . '</h2>
				<a href="infIMG.php?fecha='.$fecha2.'&pais='.$pais2.'&titulo='.$titulo2.'&usuario='.$usuario2.'">
					<img src="images/kite.jpg" alt="Imagen">
				</a>
				<p>
					'. $fecha2 .'
				</p>
				<p>
					' . $pais2 . '
				</p>'
				?>
			</li>
			<li class="foto">
			<?php 
				$titulo3="BOOM";
				$fecha3="08/04/2017";
				$pais3="Perú";
				$usuario3="Paco";
				
				echo '<h2>' . $titulo3 . '</h2>
				<a href="infIMG.php?fecha='.$fecha3.'&pais='.$pais3.'&titulo='.$titulo3.'&usuario='.$usuario3.'">
					<img src="images/volcan.jpg" alt="Imagen">
				</a>
				<p>
					'. $fecha3 .'
				</p>
				<p>
					' . $pais3 . '
				</p>'
				?>
			</li>
			<li class="foto">

			<?php 
				$titulo4="Good&nbsp;views";
				$fecha4="12/02/2017";
				$pais4="Rio%20Janeiro";
				$usuario4="Alberto";
				
				echo '<h2>' . $titulo4 . '</h2>
				<a href="infIMG.php?fecha='.$fecha4.'&pais='.$pais4.'&titulo='.$titulo4.'&usuario='.$usuario4.'">
					<img src="images/caribe.jpg" alt="Imagen">
				</a>
				<p>
					'. $fecha4 .'
				</p>
				<p>
					' . $pais4 . '
				</p>'
				?>
			</li>
			<li class="foto">

			<?php 
				$titulo5="Life&nbsp;style";
				$fecha5="03/01/2017";
				$pais5="Bali";
				$usuario5="Andres";
				
				echo '<h2>' . $titulo5 . '</h2>
				<a href="infIMG.php?fecha='.$fecha5.'&pais='.$pais5.'&titulo='.$titulo5.'&usuario='.$usuario5.'">
					<img src="images/surf.jpg" alt="Imagen">
				</a>
				<p>
					'. $fecha5 .'
				</p>
				<p>
					' . $pais5 . '
				</p>'
				?>
			</li>
		</ul>
		
		
		<!-- FIN GALERIA -->
	</main>
	
<!-- PÍE DE PÁGINA -->
	<?php require("includes/pie.inc"); ?>
<!-- FIN PÍE -->