<?php
$ts=5;
$publickey= "5fe489e758d823da57328a4502ab830d";
$privatekey= "019383d158f35c0514a4ef50760387bda3e05d17";
$hash =md5($ts.$privatekey.$publickey);
$URI = "https://gateway.marvel.com:443/v1/public/characters?name=Spider-Man&ts=$ts&apikey=$publickey&hash=$hash";
$data=file_get_contents($URI);
//var_dump($data);
/*$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$URI);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$data = curl_exec($ch);
curl_close($ch);
var_dump($body=file_get_contents($URI));*/
//var_dump($data);
/*
var_dump($body=file_get_contents($URI));*/
   //echo"<pre>";
$result=json_decode($data,true);
//var_dump( $result  );
echo "Personaje:".$result["data"]["results"][0]["name"]."<br>";
echo "Descripcion:".$result["data"]["results"][0]["description"]."<br>";
echo "<img src='".$result["data"]["results"][0]["thumbnail"]["path"]. ".jpg'><br>";
   //echo "</pre>";
