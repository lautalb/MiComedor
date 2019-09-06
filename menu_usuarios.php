<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="css/estilos_menu.css">
</head>
<body>
 <div id="menu">
    <ul id="slide-out" class="side-nav fixed">
     	<li>

        <?php
        include_once('conexion.php');

$rol = ucfirst($_SESSION['rol']); // obtengo el rol del usuario para mostrarlo en pantalla. ucfirst pone la primera letra en mayúscula.
  // importo el archivo con la conexión para hacer la búsqueda de la foto de perfil
       $result = mysqli_query($conn, "SELECT foto FROM usuarios WHERE usuario = '$user'");			
		// row guarda el resultado de la consulta
		$row = mysqli_fetch_assoc($result);		
		// Variable $foto obtiene la url donde se aloja la foto del usuario, es la ruta de la imagen.
		$foto = $row['foto'];
		
		/* elige aleatoriamenteu un fondo para mostrar en el cuadrito del perfil. 
        $fondos = array("fondo", "fondo2", "fondo3", "fondo4");
        $var_fondo = "'img/".$fondos[array_rand($fondos, 1)].".jpg'";*/
         ?>
     		<!-- <div class="row perfil" style="background-image: url(<?php print($var_fondo); ?>)">-->
				<div class="row perfil">
	     		<!-- print($foto) va a imprimir en pantalla la url que guardamos de la búsqueda a la BD, de ese modo se muestra la foto en el pefil -->
	     		<div class="col m6" ><img class="img_perfil" src="<?php print($foto); ?>"></div>
	     		<div class="col m6">
	     			<!-- imprime el nombre de usuario con la primera letra en mayúscula e imprime el rol en la pantalla -->
	     			<div class="rol"><?php print(ucfirst($user)); ?></div>
					<div class="rol"><?php  print($rol) ?></div> 	
     				<hr>
     			</div>
		</li>
        <li><a href="principal.php" style="padding-left: 15px">Inicio <i class="material-icons left">home</i></a></li>
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

         <?php if($rol == 'Voluntario') : ?>
             	<ul class="collapsible collapsible-accordion">
          		<li><a class="collapsible-header"><i class="material-icons left">favorite_border</i>Donaciones<i class="material-icons right">arrow_drop_down</i></a>
            		<div class="collapsible-body">
              	<ul>
		            <li><a href="buscardonador.php">Buscar donador</a></li>
		            <li><a href="nuevo_donador.php">Añadir donador</a></li>
			        <li><a href="nuevo_boletin.php">Generar boletín</a></li>
			    	</div>
          		</li>
        	</ul>
      
    
    		<ul class="collapsible collapsible-accordion">
      			<li><a class="collapsible-header"><i class="material-icons left">account_balance</i>Contabilidad<i class="material-icons right">arrow_drop_down</i></a>
            		<div class="collapsible-body">
              		<ul>
		            <li><a href="libro_diario.php?tipo=2">Añadir donación</a></li>
			        <li><a href="libro_diario.php?tipo=1">Añadir gasto</a></li>
			        <li><a href="libro_diario.php">Ver libro diario</a></li>
			        </div>
		          </li>
		        </ul>
		      </li>

		    <ul class="collapsible collapsible-accordion">
		        <li><a class="collapsible-header"><i class="material-icons left">free_breakfast</i>Menús<i class="material-icons right">arrow_drop_down</i></a>
		            <div class="collapsible-body">
		              <ul>
			            <li><a href="asignar_menu.php">Seleccionar menú</a></li>
				        <li><a href="lista.php
                  ">Añadir lista de compra</a></li>
				        <li><a href="stock.php">Ver stock</a></li>
				    </div>
		        </li>
		    </ul>
		      
		    <ul class="collapsible collapsible-accordion">
		        <li><a class="collapsible-header"><i class="material-icons left">trending_up</i>Informes<i class="material-icons right">arrow_drop_down</i></a>
		            <div class="collapsible-body">
		              <ul>
		            <li><a href="listar_asistentes.php">Listar asistentes</a></li>
			        <li><a href="badges.html">Añadir donación</a></li>
			        <li><a href="collapsible.html">Buscar donaciones</a></li>
			        </div>
		          </li>
			</ul>
			<ul class="collapsible collapsible-accordion">
		        <li><a class="collapsible-header"><i class="material-icons left"><img style="padding-right: 4px; padding-top: 5px; width: 30px; height: 40px;" src="img/rs.png"></i>Redes sociales<i class="material-icons right">arrow_drop_down</i></a>
		            <div class="collapsible-body">
		              <ul>
		            <li><a href="twitter.php">Twitter</a></li>
			        <li><a href="facebook.php">Facebook</a></li>
			        <li><a href="collapsible.html">Whatsapp</a></li>
			        </div>
		          </li>
			</ul>

         <?php endif; ?>
		<?php  if ($rol == 'Donador') : ?>
		<li><a href="#!" style="padding-left: 15px">Mis donaciones <i class="material-icons left">heart</i></a></li>
		<?php endif; ?> 
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
</body>
</html>