<?php 
require_once('TwitterAPIExchange.php');

            /** Set access tokens here - see: https://dev.twitter.com/apps/ **/ 
    // array de acceso
    $settings = array(
        'oauth_access_token' => '',
        'oauth_access_token_secret' => '',
        'consumer_key' => '',
        'consumer_secret' => '',
    );

$url = "https://api.twitter.com/1.1/statuses/update.json";

// tipo de metodo
$requestMethod = 'POST';
$wp = array(CURLOPT_SSL_VERIFYPEER => false);

//tweet
$postfields = array('status' => $mensaje);

// instancia de la conexion con twitter
$twitter = new TwitterAPIExchange ($settings);

// enviamos el tweet
/** Perform the request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();

             ?>