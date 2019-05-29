<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <div id="menu">
    <ul id="slide-out" class="side-nav fixed">
     	<li>

        <?php
        $rol = $_SESSION["rol"]; 
        
        // elige aleatoriamenteu un fondo para mostrar en el cuadrito del perfil. 
        $fondos = array("fondo", "fondo2", "fondo3", "fondo4");
        $var_fondo = "'img/".$fondos[array_rand($fondos, 1)].".jpg'";
         ?>
     		<div class="row perfil" style="background-image: url(<?php print($var_fondo); ?>)">
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
		<?php if($rol == 'administrador') : ?>
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

         <?php if($rol == 'voluntario') : ?>
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
		            <li><a href="sass.html">Añadir donador</a></li>
			        <li><a href="badges.html">Añadir donación</a></li>
			        <li><a href="collapsible.html">Buscar donaciones</a></li>
			        </div>
		          </li>
			</ul>
         <?php endif; ?>
		<?php  if ($rol == 'donador') : ?>
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


</body>
</html>