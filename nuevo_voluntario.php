<?php  
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$user = $_SESSION['usuario'];
include ("conexion.php");
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
<!-- obtiene las variables que pasé por GET para el saludo inicial y llenar las tarjetas -->
  <?php $rol = ucfirst($_SESSION['rol']); 
        // importo el archivo con la coneión para hacer la búsqueda de la foto de perfil
        $result = mysqli_query($conn, "SELECT foto FROM usuarios WHERE usuario = '$user'");			
		// Variable $row hold the result of the query
		$row = mysqli_fetch_assoc($result);		
		// Variable $foto obtiene la url donde se aloja la foto del usuario
		$foto = $row['foto'];
  ?>
<body id="container">
	<!-- NavBar lateral -->
    <div id="menu">
    <ul id="slide-out" class="side-nav fixed">
     	<li>
     		<div class="row perfil">
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
        <li><a href="Principal.php" style="padding-left: 15px">Inicio <i class="material-icons left">home</i></a></li>
      
<?php if($rol == 'Administrador') : ?>
    <ul class="collapsible collapsible-accordion">
          		<li><a class="collapsible-header"><i class="material-icons left">account_circle</i>Personal<i class="material-icons right">arrow_drop_down</i></a>
            		<div class="collapsible-body">
              	<ul>
		            <li><a href="sass.html">Añadir voluntario</a></li>
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
   

<div class="container">
	
	<form class="nuevo_voluntario" method="POST" action="alta_voluntario.php"  enctype="multipart/form-data" >
	<div class="row"><h3>Añadir voluntario</h3></div>
	<div class="row">
	    <div class="col m5"><label>Nombre</label><input type="text" name="nombre" placeholder="Nombre"></div>
		<div class="col m5"><label>Apellido</label><input type="text" name="apellido" placeholder="Apellido"></div>	
	</div>
	
	<div class="row">
	    <div class="col m5"><label>Email</label><input type="email" name="email" placeholder="Email"></div>
		<div class="col m5"><label>Tel. </label><input type="text" name="tel" placeholder="Teléfono"></div>	
	</div>

	<div class="row">
	    <div class="col m5"><p><label><input name="rol" value="administrador" type="radio" checked />
        <span>administrador</span></label></p></div>
		
		<div class="col m5"><p><label><input name="rol" value="voluntario" type="radio" />
        <span>voluntario</span></label></p></div>
		
	</div>
	       <input type="file" name="uploadedFile" />
  	<div>
			<button class="btn" name="uploadBtn" value="Upload" type="submit">Enviar</button>
	</div>
	</div>
	</form>

  </form>
	</div>


	<!-- verifica el número de status y si hay alguno, muestra el mensaje en pantalla. -->
	<?php 	
	$status = $_GET['status'];
	if ($status != 0) : ?>
		<div class="mi"> 
	<?php print($_SESSION['message']); endif; ?>
		</div>

<div class="row">
<!-- footer -->
<footer>© 2019 Lautaro Medina y Laura Rivero</footer>
</div>

<?php 	$conn->close(); ?>
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