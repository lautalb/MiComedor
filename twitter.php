<?php  
session_start();
$_SESSION['usuario'] = 'zoe';
$user = 'zoe';
//Comprobamos existencia de la sesión 
if (empty($_SESSION['usuario'])) {
   header('location:index.php');}   

// guarda el usuario en la sesión
$user = $_SESSION['usuario'];

// Comprobar si $_SESSION["timeout"] está establecida
$inactividad = 600; 
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"]; // hora actual - hora en la que inició sesión, al llegar a 600 segundos se desconecta.
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: cerrar_sesion.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Página Principal - Alimentar</title>
	<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/estilos_bots.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>


<style>
  h1, h2, h3, h4, h5, h6 {
     display:inline; 
  }

</style>
</head>
<body id="container">
	<!-- NavBar lateral -->
  <?php include('menu_usuarios.php');?>	
     
    <div class="row inicial">
      <div class="col m4"><h4>Twitter</h4></div>
      <div class="m8"><img class="right" src="img/logo-banner.png"></div>
    </div>
  <div>
    <p>La cuenta de twitter del comedor es @comedor_mi</p>
  </div>
  
  <div class="row">
    <div class="col m5 bordes">
    <p>Enviar tweet: </p>     
    <form action="bot/botConInput.php" method="POST">
      <input type="text" name="mensaje" required="true">
      <input type="submit" name="enviar">
    </form>
    </div>

    <div class="col m1"></div>
    <div class="col m5 bordes">
    <p>Enviar tweet con imagen: </p>     
    <form action="bot/botImagenes.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="mensaje2" required="true">
      <input type="file" name="myfile" />      
      <input  name="uploadBtn" value="Upload" type="submit">
    </form>
    </div>
  </div>  

<div class="row">
  <div class='col m5 bordes' >
  <p>Últimos tweets: </p>
  <?php include_once('bot/ultimosTweets.php') ?>
</div>
 <div class="col m1"></div>
  <div class='col m5 bordes center' >
    <p>Hashtags: </p>
    <?php include_once('bot/nube_hashtags.php') ?>
  </div>
</div>

<div class="row">
<!-- footer -->
<footer>© 2019 Lautaro Medina y Laura Rivero</footer>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>
<script id="rendered-js" src="js/funciones.js"></script>

</body>
</html>