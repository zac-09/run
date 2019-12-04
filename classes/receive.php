<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/post.php";
$dht = $_GET['dht'];
$water = $_GET['water'];
$humidity = $_GET['humidity'];
$pir = $_GET['pir'];



        if(!empty($dht) && !empty($water) &&!empty($humidity) && !empty($pir))
{
    $db = new DB();
    $db->switch();
   $result = $db->first() ;
   
    $results = json_encode($result);
   
   echo $results;
    
}
else{
    echo 'request failed';
}
$upload = new post();
$upload->insert([
    'DHT' => $dht,
    'WATER' => $water,
    'HUMIDITY' => $humidity,
    'PIR' => $pir

]);








?>