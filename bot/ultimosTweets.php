<?php
require_once('TwitterAPIExchange.php');
 require_once('credenciales.php');

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$fields = '?screen_name=comedor_mi&count=5';
$twitter = new TwitterAPIExchange($settings);
$data = $twitter->setGetfield($fields)->buildOauth($url, "GET")->performRequest();
$tweets = json_decode($data);
$salida = "<table>
			<thead>
			<tr><td>Fecha</td><td>Tweet</td></tr></thead></tbody>";  

foreach($tweets as $tweet){
	$feachaDeCreacin = $tweet->created_at;
	$texto = $tweet ->text;
	
	//echo $tweet->created_at ."</br>". $tweet->created_at ."------------------------- </br>";
	//print_r($tweet);
	if(!empty($tweet->entites->urls)){
		foreach ($tweet ->entities ->urls as $url1) {
			$remplazo = '<a href="'.$url1->url.'">'.$url1->url.'</a>';
			$texto = str_replace (  $url1->url ,  $remplazo ,  $tweet->text );
			$salida.="<tr><td>".$tweet->created_at."</td><td>".$texto."</td></tr> \n";
		
		}
	}
	$salida.="<tr><td>".$tweet->created_at."</td><td>".$texto."</td></tr> \n";
	
	}
	$salida.="</tbody></table>"; 
print($salida);

?>
