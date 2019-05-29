<?php  
session_start();
// guarda el usuario en la sesión
$user = $_SESSION['usuario'];

//Comprobamos existencia de sesión
if (empty($_SESSION['usuario'])) {
   header('location:index.php');}   

// Comprobar si $_SESSION["timeout"] está establecida
$inactividad = 600;
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: cerrar_sesion.php");
        }
    }

// probando si funciona la sesión. Si imprime el usuario está OK.
echo $_SESSION['usuario'];
//borrar
?>

<!DOCTYPE html>
<html>
<head>
	<title>Página Principal - Alimentar</title>
	<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<!-- obtiene las variables que pasé por GET o en la SESSION para el saludo inicial y llenar las tarjetas -->
  <?php $rol = ucfirst($_SESSION['rol']); // obtengo el rol del usuario para mostrarlo en pantalla. ucfirst pone la primera letra en mayúscula.
  // importo el archivo con la conexión para hacer la búsqueda de la foto de perfil
      include ("conexion.php"); // $conn es la variable donde está guardada la conexión y está en el archivo conexión
       $result = mysqli_query($conn, "SELECT foto FROM usuarios WHERE usuario = '$user'");			
		// row guarda el resultado de la consulta
		$row = mysqli_fetch_assoc($result);		
		// Variable $foto obtiene la url donde se aloja la foto del usuario, es la ruta de la imagen.
		$foto = $row['foto'];
		
		// Probando si recupera la url de la imagen y la puede mostrar
		print($foto);
		// borrar

  ?>
<body id="container">
	<!-- NavBar lateral -->
     <?php  
      include('menu_usuarios.php');?>

<a href="#" data-activates="collapsible-header" class="button-collapse1 hide-on-large-only">
	
  <div id="content">
    <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
	
   <?php // guarda en la sesión la cantidad de listas y si está seleccionado el menú.
         $cant = $_SESSION['cantidad']; 
        $seleccion = $_SESSION['seleccion'];

 ?>            

<!-- Tarjetas con información relevante para el usuario.-->
	<div class="inicial">
  		<p> ¡Hola <?php print(ucfirst($user)); ?>!</p>
  	</div>

<div class="row">
    <div class="col m4">
      <div class="card blue-grey darken-1 dif hoverable">
        <div class="card-content white-text dif hoverable">
          <span class="card-title">Selección de menú</span>
          	<?php 
          		if ($seleccion == '') {
          			print("No hay menú seleccionado");
          		} else { 
					print("Menú seleccionado: ".$seleccion);
          		}
          	 ?>
        </div>
        
        <div class="card-action dif">
          <a href="#">Menú 1</a>
          <a href="#">Menú 2</a>
        </div>
      </div>
    </div>

    <div class="col m4">
      <div class="card blue-grey darken-1 hoverable">
        <div class="card-content white-text hoverable">
          <span class="card-title">Lista de compras</span>
          <p>Hay <?php print($cant); ?>
          listas de compras listas para enviar.</p>
          <p>Revisá acá el pedido.</p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>

    <div class="col m4">
      <div class="card blue-grey darken-1 hoverable">
        <div class="card-content white-text dif2 hoverable">
          <span class="card-title">Libro Diario</span>
          <p>Ingresá nuevos gastos o donaciones desde acá.
          </p>
        </div>
        <div class="card-action">
          <a href="#">Gastos</a>
          <a href="#">Donaciones</a>
        </div>
      </div>
    </div>

  </div>
<div class="row">
    <!-- footer -->

<footer>© 2019 Lautaro Medina y Laura Rivero</footer>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>

	<script id="rendered-js">
      $('.button-collapse').sideNav({
  menuWidth: 300, // Default is 300
  edge: 'left', // Choose the horizontal origin
  closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
  draggable: true // Choose whether you can drag to open on touch screens,
});
      //# sourceURL=pen.js
    </script>

</body>
</html>