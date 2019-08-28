<?php 
/*Incluimos nuestra librería*/
require_once("twitterClass.php");

/*Vamos a https://developer.twitter.com/apps y conseguimos nuestras keys como explique en los post de bot de twitter con python*/
/*y las declaramos en las variables*/
$api_key='cRF19n0SxgY13TTRvivnW8pDS';
$api_secret='vSEyAX6mFfFnXqpuyyzfRrazdjjJJYQpxQctgTQCKzc2Ptr2xn';
$access_token='1078699504201809921-ixJ37LruSG3cRPtUmOavXbBtbW5YhP';
$access_token_key='UBXJppLyn8aMI6XIym6udMM6V580v9KwZwGNCt7Ol4Mra';


$tweet=new tweet_bot;
$tweet->setKey($api_key, $api_secret,$access_token , $access_token_key);
$result=$tweet->tweet("Probando, probando...");

?> 