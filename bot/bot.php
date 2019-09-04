<?php 
require_once('TwitterAPIExchange.php');

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

// enviamos el tweet
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();

             ?>
