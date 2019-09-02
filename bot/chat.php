<?php 
include_once('conexion.php');

$sql = mysqli_query($conn, "SELECT * FROM bot");
$_SESSION['bot'] = array();
$x = 0;

while ($row = $sql->fetch_assoc()) {
	$bot[$row['pregunta']] = $row['respuesta'];
//	$pregunta[$row['pregunta']] = $x;
//	$respuesta[$x] = $row['respuesta'];
	$x++;
	}

//$_SESSION['pregunta'] = $pregunta;
//$_SESSION['respuesta'] = $respuesta;
$_SESSION['bot'] = $bot;
//print_r($_SESSION['pregunta']);
//print_r($_SESSION['respuesta']);
//$_SESSION['bot'] = $bot;



// print_r($_SESSION['bot']);

 ?>