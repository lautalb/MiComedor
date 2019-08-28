<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <script src="https://www.gstatic.com/firebasejs/6.4.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.2.4/firebase-firestore.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/paginaDeInicio.css" />
    <title>Comedor</title>

    <style type="text/css">
	/* p { 
	border: 1px solid #000; }*/
	
	.modal {
	 	width: 400px;
	 	height: 350px;
	 	margin-top: 20%;
		margin-left: 73%;
		border-radius: 15px;
	 }
	

	 .chat {
	 	background-color: #98edaf;
	 	border-radius: 5px;
	 }
	 .usuario {
	 	background-color: #f5cef4;
	 	border-radius: 5px;
	 }

	 .robot {
	 	padding-right: 1px;
	 }
	 .escribiendo {
	 	width: 20px;
	 	height: 20px;
	 }

</style>
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="nav-wrapper">
                <a href="   paginaDeInicio.php" class="brand-logo"><img src="img/logo-banner.png" alt=""></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#" id="btn-noticias"><i class="material-icons left">fiber_new</i>Noticias</a></li>
                    <li><a href="#" id="btn-acerca-de"><i class="material-icons left">import_contacts</i>Acerca de</a></li>
                    <li><a href="#" id="btn-donaciones"><i class="material-icons left">favorite_border</i>Donaciones</a></li>
                    <li><a href="#"><i class="Small material-icons left">map</i>Mapa</a></li>
                    <li><a href="http://comedorescomunitarios.ga/"><i class="Small material-icons left">account_box</i>Ingresar</a></li>
                </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
        <li><a href="#" id="btn-noticias"><i class="material-icons left">fiber_new</i>Noticias</a></li>
                    <li><a href="#" id="btn-acerca-de"><i class="material-icons left">import_contacts</i>Acerca de</a></li>
                    <li><a href="#" id="btn-donaciones"><i class="material-icons left">favorite_border</i>Donaciones</a></li>
                    <li><a href="#"><i class="Small material-icons left">map</i>Mapa</a></li>
                    <li><a href="http://comedorescomunitarios.ga/"><i class="Small material-icons left">account_box</i>Ingresar</a></li>
        </ul>
    </header>

    <div class="container">
        <div class="row">
            <!-- SLIDER -->
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="img/comedor 1.jpg">
                        <!-- random image -->
                        <div class="caption center-align">
                            <!-- <h3>This is our big Tagline!</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
                        </div>
                    </li>
                    <li>
                        <img src="img/1.jpg">
                        <!-- random image -->
                        <div class="caption left-align">
                            <!-- <h3>Left Aligned Caption</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
                        </div>
                    </li>
                    <li>
                        <img src="img/2.jpg">
                        <!-- random image -->
                        <div class="caption right-align">
                            <!-- <h3>Right Aligned Caption</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
                        </div>
                    </li>
                    <li>
                        <img src="img/3.jpg">
                        <!-- random image -->
                        <div class="caption center-align">
                            <!-- <h3>This is our big Tagline!</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
                        </div>
                    </li>
                </ul>
            </div>


            
                
     <div class="container">
         <div class="col s12 m3">

            <!-- Gitter Chat Link -->
    <div class="fixed-action-btn"><a class="btn-floating btn-large red modal-trigger"
                    href="#modal1"><i class="large material-icons">chat</i></a>
                </div>
<!-- Modal Trigger -->
        <div id="modal1" class="modal">
            <div class="modal-content" >
    	    <div class="barra"><h6>¿En qué podemos ayudarte? <br></h6></div>
      	    <div><p id="bienvenida">Hola! Nos encantaría poder ayudarte. ¿Sobre qué querés más info? Donar, voluntario, ayudar, dirección, otros.</p></div>

		<div class="row"><p id="chatLog"></p></div>
     	<img style="visibility: hidden;" id="escribiendo" class="escribiendo" src="img/p.png">  
     	<input id="userBox" type="text" onkeydown="if (event.keyCode == 13) {talk()}">
       	</div>
    	</div>
  	</div>
     </div>
                 
       

        </div>
         </div>

    </div>

    <div class="container">
        <div class="noticias" id="noticias">
            <H2>Noticias</H2>
            <div class="row">
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img class="imgnoticias" id="imgNoticia1" src="img/noticia1.jpg">
                            <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#" >This is a link</a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/noticia1.jpg">
                            <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#" >This is a link</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col s12 m12">
                      <div class="twitter card white">
                        <div class="card-content white-text">
                          <span class="card-title center">Ultimos tweets</span>
                          <?php include_once('bot/ultimosTweets.php') ?>
                        </div>
                        
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="acercaDe" id="acercaDe">
                <H2> Acerca de</H2>
                <div class="parrafo">
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos facilis rerum necessitatibus sint
                        pariatur asperiores qui blanditiis, magni architecto voluptates voluptatum? Consectetur at ipsam
                        molestiae aliquid possimus, pariatur minima
                        accusamus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime eveniet laudantium
                        omnis sapiente neque voluptate labore commodi natus incidunt in id cupiditate, pariatur sint
                        quis corporis aspernatur rerum recusandae
                        nostrum. Lorem ipsum dolor sit amet consectetur adipisicing elit. In optio ipsa odio, porro
                        possimus eveniet rerum impedit consequuntur adipisci modi, sapiente doloribus ad. Voluptas at
                        harum deleniti expedita quaerat animi.
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="donaciones" id="donaciones">
                <H2>Donaciones</H2>
                <div class="parrafo">
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos facilis rerum necessitatibus sint
                        pariatur asperiores qui blanditiis, magni architecto voluptates voluptatum? Consectetur at ipsam
                        molestiae aliquid possimus, pariatur minima
                        accusamus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime eveniet laudantium
                        omnis sapiente neque voluptate labore commodi natus incidunt in id cupiditate, pariatur sint
                        quis corporis aspernatur rerum recusandae
                        nostrum. Lorem ipsum dolor sit amet consectetur adipisicing elit. In optio ipsa odio, porro
                        possimus eveniet rerum impedit consequuntur adipisci modi, sapiente doloribus ad. Voluptas at
                        harum deleniti expedita quaerat animi.
                    </p>
                    <div class="boton">
                        <a class="waves-effect waves-light btn">Donar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5>Dirección</h5>
                    <p>Av Corrientes 5860
                    </p>
                </div>
                
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2019 Sistema desarrollado por Laura Rivero y Lautaro Medina
                
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/paginaDeInicio.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->
</body>

</html>