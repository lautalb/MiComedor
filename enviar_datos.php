<?php
error_reporting(E_ALL ^ E_NOTICE);

// Comienzo de la sesión
session_start();
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

// Guardar datos de sesión
$_SESSION["usuario"] = $usuario;
$_SESSION["pass"] = $pass;

include("conexion.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/* comprobar la conexión */
if ($conn->connect_errno) {
  printf("Falló la conexión: %s\n", $mysqli->connect_error);
  exit();
}
	// chequea que el usuario y el pass coincidan.
	$sql = mysqli_query($conn,"SELECT usuario FROM usuarios where usuario = '$usuario' and pass = '$pass'");
	if ($sql->num_rows > 0) {
		// si la búsqueda dio por lo menos 1 fila es porque existe el usuario con ese pass. chequea si el usuario está activo.
    	$result = mysqli_query($conn, "SELECT activo from usuarios where usuario = '$usuario' and pass = '$pass'");
		$row = mysqli_fetch_assoc($result);
		$activo = $row['activo']; // guarda el resultado en una variable.
			
			if ($activo == 0) { // si el usuario está inactivo, lo envía al index con un error para mostrar en pantalla.
				header("Location:index.php?est=2");

	 			// echo "<script>alert('Usuario inactivo. Tiene que verificar su cuenta.');			                window.location= 'index.php?activo=0'</script>";
			} else {
				// Busca el rol 
			$result = mysqli_query($conn, "SELECT rol FROM usuarios WHERE usuario = '$usuario' and pass = '$pass'");
			$row = mysqli_fetch_assoc($result);
			$rol = $row['rol'];
			$_SESSION["rol"] = $rol; // guarda el rol en la sesión.
			
				// si es otro tipo de usuarios, busca las listas activas
				$sql1 = "SELECT id FROM listas ";
				$result1 = $conn->query($sql1);	
				$_SESSION['cantidad'] =$result1->num_rows; // guarda la cantidad de listas activas

				$result = mysqli_query($conn, "SELECT nombre FROM menu WHERE seleccion = 1");
				$row = mysqli_fetch_assoc($result);
				$_SESSION['seleccion'] = $row['nombre'];
				$seleccion = $_SESSION['seleccion'];
			
				header("Location:principal.php?cantidad=$cantidad&seleccion=$seleccion&usuario=$usuario&rol=$rol");
				
			}
			
	} else {
						header("Location:index.php?est=1");
}


$conn->close();

?>