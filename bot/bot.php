<?php 
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => '1161801486063538177-5SfvvlED1PrZATj3PPaBdrkDjEzVlL',
    'oauth_access_token_secret' => 'LdzpTM05puTWxk79N3DXsaeAKRgnG2isl1F9Vnl7fruTl',
    'consumer_key' => 'DciCF9fMGrsDhNO7ItaXHWPw0',
    'consumer_secret' => 'epX4yTJcJ3udDt2qbOq9IrYj9NAHXzIxdLWyq1bVmyHvINsNUE',
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