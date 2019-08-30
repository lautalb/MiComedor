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
	$texto = $tweet->text;
	if (!empty($tweet->entities->urls)) {		
		foreach($tweet->entities->urls as $url1){ 
			$reemplazar = $url1->url;
			$reemplazo = "<a href='". $reemplazar ."''>".$reemplazar."</a>";
			$texto = str_replace ( $reemplazar , $reemplazo , $texto );
			}
		}
	if (!empty($tweet->entities->media)){
		foreach($tweet->entities->media as $url2){ 
			$reemplazar = $url2->url;
			$reemplazo = "<a href='".$url2->media_url_https."' target='_blank'><img class='right' src='". $url2->media_url_https ."' width='50px' height='50px'>";
			$texto = str_replace ( $reemplazar , $reemplazo , $texto );
			}
		}
	$salida.="<tr><td>".$tweet->created_at."</td><td>".$texto."</td></tr> \n";	
	}
	$salida.="</tbody></table>"; 

print($salida);

?>
