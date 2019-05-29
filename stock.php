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
  <?php $rol = ucfirst($_SESSION['rol']); 
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
    <div id="menu">
    <ul id="slide-out" class="side-nav fixed">
     	<li>

        <?php 
        $colores = array("fondo", "fondo2", "fondo3", "fondo4");
        $var_export = "'img/".$colores[array_rand($colores, 1)].".jpg'";
         ?>

     		<div class="row perfil" style="background-image: url(<?php print($var_export); ?>)">
	     		<div class="col m2"></div>
	     		<!-- print($foto) va a imprimir en pantalla la url que guardamos de la búsqueda a la BD, de ese modo se muestra la foto en el pefil -->
	     		<div class="col m4" ><img class="img_perfil" src="<?php print($foto); ?>"></div>
	     		<div class="col m6">
	     			<!-- imprime el nombre de usuario con la primera letra en mayúscula e imprime el rol en la pantalla -->
	     			<div class="rol"><?php print(ucfirst($user)); ?></div>
					<div class="rol"><?php  print($rol) ?></div> 	
     				<hr>
     			</div>
		</li>
        <li><a href="#!" style="padding-left: 15px">Inicio <i class="material-icons left">home</i></a></li>
      <!-- si el usuario es administrador, a la barra común se le agrega Personal -->
<?php if($rol == 'Administrador') : ?>
    <ul class="collapsible collapsible-accordion">
          		<li><a class="collapsible-header"><i class="material-icons left">account_circle</i>Personal<i class="material-icons right">arrow_drop_down</i></a>
            		<div class="collapsible-body">
              	<ul>
		            <li><a href="nuevo_voluntario.php?status=0">Añadir voluntario</a></li>
			        <li><a href="badges.html">Modificar/baja voluntario</a></li>
	        		</div>
          		</li>
        	</ul>
          <?php endif; ?>

              	<ul class="collapsible collapsible-accordion">
          		<li><a class="collapsible-header"><i class="material-icons left">favorite_border</i>Donaciones<i class="material-icons right">arrow_drop_down</i></a>
            		<div class="collapsible-body">
              	<ul>
		            <li><a href="sass.html">Añadir donador</a></li>
			        <li><a href="badges.html">Añadir donación</a></li>
			        <li><a href="collapsible.html">Buscar donaciones</a></li>
	        		</div>
          		</li>
        	</ul>
      
    
    		<ul class="collapsible collapsible-accordion">
      			<li><a class="collapsible-header"><i class="material-icons left">account_balance</i>Contabilidad<i class="material-icons right">arrow_drop_down</i></a>
            		<div class="collapsible-body">
              		<ul>
		            <li><a href="sass.html">Añadir donación</a></li>
			        <li><a href="badges.html">Añadir gasto</a></li>
			        <li><a href="collapsible.html">Ver libro diario</a></li>
			        </div>
		          </li>
		        </ul>
		      </li>

		    <ul class="collapsible collapsible-accordion">
		        <li><a class="collapsible-header"><i class="material-icons left">free_breakfast</i>Menús<i class="material-icons right">arrow_drop_down</i></a>
		            <div class="collapsible-body">
		              <ul>
			            <li><a href="sass.html">Seleccionar menú</a></li>
				        <li><a href="badges.html">Añadir menú</a></li>
				        <li><a href="collapsible.html">Ver menús</a></li>
				    </div>
		        </li>
		    </ul>
		      
		    <ul class="collapsible collapsible-accordion">
		        <li><a class="collapsible-header"><i class="material-icons left">trending_up</i>Informes<i class="material-icons right">arrow_drop_down</i></a>
		            <div class="collapsible-body">
		              <ul>
		            <li><a href="sass.html">Añadir donador</a></li>
			        <li><a href="badges.html">Añadir donación</a></li>
			        <li><a href="collapsible.html">Buscar donaciones</a></li>
			        </div>
		          </li>
			</ul>

			<ul class="collapsible collapsible-accordion">
			        <li><a class="collapsible-header"><i class="material-icons left">location_on</i>Mapas<i class="material-icons right">arrow_drop_down</i></a>
			            <div class="collapsible-body">
			              <ul>
			            <li><a class="mapa" href="sass.html">Mapa completo</a></li>
			            <hr>
				        <li><a href="badges.html">Listados</a></li>
				        </div>
			          
			          </li>
				</ul>
      	<li><a href="#!" style="padding-left: 15px">Configuración<i class="material-icons left">build</i></a></li>

      	<li><a href="cerrar_sesion.php" style="padding-left: 15px">Cerrar Sesión<i class="material-icons">close</i></a></li>
       	<li class="no-padding">
    </ul>  
  </div>
<a href="#" data-activates="collapsible-header" class="button-collapse1 hide-on-large-only">
	
  <div id="content">
    <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
	
<?php 
include("conexion.php");

$result = mysqli_query($conn,"SELECT * FROM ingredientes"); 

if ($row = mysqli_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
   echo "<tr><td>id</td><td>nombre</td><td>descripcion</td><td>cantidad</td></tr> \n"; 
   do { 
      if ($row["cantidad"] == 0){
      echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["descripcion"]."</td><td>"."Sin stock"."</td></tr> \n"; 

      } else {      echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["descripcion"]."</td><td>".$row["cantidad"]."</td></tr> \n"; 
}

   } while ($row = mysqli_fetch_array($result)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 

?> 
  
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