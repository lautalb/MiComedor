<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start();
session_destroy();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Alimentar - miComedor 2.0</title>
	<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
<!-- Logo / Div superior -->
<div id="marca">
	<img id="logo" src="img/logo.png">
</div>

<!-- Login / Div inferior -->
<div id="down">
	<div id="login">
		<form method="POST" action="enviar_datos.php" autocomplete="off">	
		<label>Usuario: </label>	
		<input type="text" name="usuario" placeholder="Usuario" required>
		<label>Contraseña</label>
		<input type="text" name="pass" placeholder="Contraseña" required>

		<button class="btn waves-effect waves-light" type="submit" name="action">Entrar
    <i class="material-icons right">send</i></button>
		<a href="recuperarclave.html">Recuperar contraseña</a>
		

		<!-- Chequea si hay errores de ingreso para mostrar en la pantalla -->
		<div class="errores"> 
		<?php 
			$est = $_GET['est'];
			switch ($est) {
				case '1':
					print('El ususario no existe.');
					break;
				case '2':
					print('El ususario se encuentra inactivo.');
				default:
					# code...
					break;
			}
		?>
		</div>
		</form>
	</div>	
</div>



<!-- footer -->
<div id="footer">Sistema desarrollado por Lautaro Medina y Laura Rivero</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>


</body>
</html>