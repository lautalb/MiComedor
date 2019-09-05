<?php 
include_once('conexion.php');
if (session_status() === PHP_SESSION_NONE){
	session_start();
}

if (!isset($_SESSION['bot'])) {
	$sql = mysqli_query($conn, "SELECT pregunta, respuesta FROM bot");
	$_SESSION['bot'] = array();
	while ($row = $sql->fetch_assoc()) {
		$bot[$row['pregunta']] = $row['respuesta'];
		}
	$_SESSION['bot'] = $bot;

}

 ?>