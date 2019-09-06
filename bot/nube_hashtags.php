<?php
require_once('TwitterAPIExchange.php');
require_once('credenciales.php');

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$fields = '?screen_name=comedor_mi&count=15';
$twitter = new TwitterAPIExchange($settings);
$data = $twitter->setGetfield($fields)->buildOauth($url, "GET")->performRequest();
$tweets = json_decode($data);

$hashtags = [];
$contar_hashtags = [];
$m = '';
foreach($tweets as $tweet){
		foreach($tweet->entities->hashtags as $hash){ 
			if(in_array($hash->text, $hashtags))
			{				
				$x = $contar_hashtags[$hash->text];
				$contar_hashtags[$hash->text] = $x + 1;
				//print($hash->text. ": ". $contar_hashtags[$hash->text]. "<br>");
			} else 
			{	
				$hashtags[$hash->text] = $hash->text;
				$contar_hashtags[$hash->text] = 1;	
				//print($hash->text. ": ". $contar_hashtags[$hash->text]. " <br>");
			}
		}}


foreach ($hashtags as $h) {
	if ($contar_hashtags[$h] < 2) {
		$m.= "<h6> " . $h." </h6>";
	} else if ($contar_hashtags[$h] > 5) {
		$m.= "<h1> " . $h." </h1>";
	} else if ($contar_hashtags[$h] == 2) {
		$m.= "<h5> " . $h." </h5>" ;
	}
	
}
print($m);

?>
