<?php 
require_once('TwitterAPIExchange.php');
header("Location: ../twitter.php");

require_once('credenciales.php');
$url = "https://api.twitter.com/1.1/statuses/update.json";

// tipo de metodo
$requestMethod = 'POST';
$wp = array(CURLOPT_SSL_VERIFYPEER => false);

//tweet
if (!empty($_POST['mensaje']) ){

    $postfields = array('status' => $_POST['mensaje']." #comedor");
}
// instancia de la conexion con twitter
$twitter = new TwitterAPIExchange ($settings);

// enviamos el tweet
/** Perform the request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();

             ?>