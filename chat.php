<?php 

if (session_status() === PHP_SESSION_NONE){
  session_start();
}

if (isset($_SESSION['bot'])) {
include_once('bot/chat.php'); 
$bot1 = $_SESSION['bot'];
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/estilos_bot.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style type="text/css">
  .img { 
  /*  margin-top: 40%;
    margin-left: 1400px;*/
    width: 100px;
    height: 100px;
   }
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

<div class="row">
  <a class="col offset-m11 waves-effect waves-light modal-trigger" href="#modal1"><img class="img" src="img/chat.png"></a>
</div>

  <!-- Modal Structure -->
  <!-- Modal Structure -->
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
  
  <?php
//    print_r($pregunta);
    print_r($bot1);
  
?>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>

<script> 
	function bajar() {
		document.getElementById('modal1').scrollTop = 250000;
		document.getElementById('chatLog').scrollTop = 25000;
	}    
          function talk() {
                var user = document.getElementById("userBox").value;
                document.getElementById("userBox").value = "";
                document.getElementById("chatLog").innerHTML += "<div class='row right'><div class='col m8 usuario'>"+user+"</div><div class='col m2'><img src='img/persona.png' style='width: 25px; height: 25px;'></div></div>";
  				document.getElementById("escribiendo").style.visibility = "visible";
				bajar();
var a = '';
           var jArray =( <?php echo json_encode($bot1, JSON_UNESCAPED_UNICODE); ?>);
          
                var delayInMilliseconds = 2000; //1 second
				setTimeout(function() {
                if (user in jArray) {
                  //a = jArray[user]
                  document.getElementById("escribiendo").style.visibility = "hidden";
                    document.getElementById("chatLog").innerHTML += "<div class='row left'> <div class='col m2'><img style='width: 30px; height: 30px;' class='robot' src='img/robot.png'></div><div class='col m8 chat'>"+jArray[user]+"<br></div>";
  					 	bajar();	
					
                } else {
                    document.getElementById("chatLog").innerHTML += "<div class='row left'>  <div class='col m3'><img style='width: 30px; height: 30px;' src='img/robot.png'></div><div>"+ "Umm... no entendí. Ingresá alguna de las siguientes palabras: donar, ayudar, dirección <br></div>";
                     	bajar();
                    
                }}, delayInMilliseconds);  
            } 
	$(document).ready(function(){
		$('.modal').modal();
  	}); 
</script>
</body>
</html>