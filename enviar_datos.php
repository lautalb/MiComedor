<?php
error_reporting(E_ALL ^ E_NOTICE);


$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$bd_comedor = mysqli_connect("localhost", "root", "", "comedor");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT usuario, pass FROM usuarios where usuario = '$usuario' and pass = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

	header("Location: principal.html");

    
} else {
	 echo "<script>
	                alert('Usuario incorrecto');
                window.location= 'index.html'
    </script>";
}

$conn->close();

?>