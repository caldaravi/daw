<!-- CABECERA -->
<?php
	require('includes/cabecera.inc');
	require('includes/controlAcceso.php');
?>
<!-- FIN CABECERA  ?> -->  
		
	<main>
		<form class="card">
			<label>Introduce el correo electrónico con el que te registraste y te envíaremos un e-mail para restaurar la contraseña.<br>
				<br>E-mail 
					<input type="email" name="email" required placeholder="Introduce tu e-mail">
			</label>
			
			<input type="submit" value="Enviar">
		</form>
	</main>

<!-- PÍE DE PÁGINA -->
	<?php require("includes/pie.inc"); ?>
<!-- FIN PÍE -->