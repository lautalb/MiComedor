<?php
error_reporting(E_ALL ^ E_NOTICE);
// Comienzo de la sesión
session_start();
// Establecer tiempo de vida de la sesión en segundos
$_SESSION["timeout"] = time();

include ("conexion.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
    } 
$nombre = $_POST["nombre"];    
$mirol = $_POST["rol"];      
          
$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  // si el archivo está vacío y no hay errores, guarda el nuevo usuario con un avatar por defecto.
  if (empty($_FILES['uploadedFile']['name']) && $_FILES['uploadedFile']['error'] !== UPLOAD_ERR_OK) {
     // Guarda en la base de datos al nuevo usuario con el token y activacion en 0
        $_GRABAR_SQL = "INSERT INTO usuarios(id, usuario, pass, rol, foto, activo, token) VALUES (NULL,'$nombre','123','$mirol','perfil/avatar.png',1,123)"; 
        mysqli_query($conn, $_GRABAR_SQL);   

        // chequea que haya guardado el usuario 
        $sql = "SELECT usuario from usuarios where usuario = '$nombre' ";
        $result=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);

        $message = 'El usuario se añadió correctamente pero sin foto. Si querés agregar una foto podés ingresar a modificar perfil.';
        header("Location: nuevo_voluntario.php?status=1"); }
        else {
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  { // si el archivo se subió correctamente, se guarda el usuario con la foto.
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png');
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './perfil/';
      $dest_path = $uploadFileDir . $newFileName;
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {


        $foto = 'perfil/';
        $message ='Usuario ingresado con éxito.';

        // Guarda en la base de datos al nuevo usuario con el token y activacion en 0
        $_GRABAR_SQL = "INSERT INTO usuarios(id, usuario, pass, rol, foto, activo, token) VALUES (NULL,'$nombre','123','$mirol','$dest_path',1,123)"; 
        mysqli_query($conn, $_GRABAR_SQL);   

        // chequea que haya guardado el usuario 
        $sql = "SELECT usuario from usuarios where usuario = '$nombre' ";
        $result=mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);
        $message = 'El usuario se añadió correctamente';
        header("Location: nuevo_voluntario.php?status=1");  
      }
      else 
      {
        $message = 'Hubo un error subiendo la imagen. Consultá con el administrador.';
      }
    }
    else
    {
      $message = 'Falló la carga de la imagen. Verificá que sea: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'Hay un error en la carga. Chequeá el siguiente error:.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}}

// el mensaje que se guardó se pasa como mensaje de sesión para que se pueda recuperar en la página de nuevo voluntario y mostrarlo en pantalla.
$_SESSION['message'] = $message;
header("Location: nuevo_voluntario.php?status=1");  

$conn->close();


?>