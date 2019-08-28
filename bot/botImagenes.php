<?php
require_once('TwitterAPIExchange.php');
header("Location: ../twitter.php");
require_once('credenciales.php');
$currentDir = getcwd();
    $uploadDirectory = "/tweets/";
    $fileExtensions = ['jpeg','jpg','png']; 

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = explode('.',$fileName);

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
	$twitter = new TwitterAPIExchange($settings);

	$media = json_decode($twitter->buildOauth(
			'https://upload.twitter.com/1.1/media/upload.json',
			'POST'
			)->setPostfields(array(
				'media_data' => base64_encode(file_get_contents($uploadPath))
			))->performRequest()
		);
	$tweet = json_decode( (string) $twitter->buildOauth(
			'https://api.twitter.com/1.1/statuses/update.json',
			'POST'
		)->setPostfields(array(
			'status' => $_POST['mensaje2'],
			'media_ids' => $media->media_id_string
		))->performRequest()
	);
		
?>
