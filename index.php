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
	
</div>

<!-- Login / Div inferior -->
<div id="down">
	<div id="login">
		<form class="row input-field" method="POST" action="enviar_datos.php" autocomplete="nope">
			<div class="col s12"><img id="logo-txt" src="img/logo.png"></div>
				<div class="col s2"><i class="material-icons small">person</i></div>
				<div class="input-field col s9">
          			<input id="usuario" name="usuario" type="text" class="validate" required autocomplete="nope">
          			<label for="usuario">Usuario</label>
        		</div>
				<div class="col s2"><i class="material-icons small">enhanced_encryption</i></div>
				<div class="input-field col s9">
          			<input id="password" name="password" type="password" class="validate" required>
          			<label for="password">Contraseña</label>
        		</div>
			<button class="btn" type="submit" value="submit">Entrar</button>
		
		<div class="recuperar"><a href="#">Recuperar contraseña</a></div>
		

		<!-- Chequea si hay errores de ingreso para mostrar en la pantalla -->
		<div class="errores"> 
		<?php 
			$est = $_GET['est'];
			include_once('errores.php');
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