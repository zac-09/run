<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/post.php";
$dht = $_GET['dht'];
$water = $_GET['water'];
$humidity = $_GET['humidity'];
$pir = $_GET['pir'];
date_default_timezone_set('Africa/Kampala');
$date = date('m-d-Y h:i:s ', time());


$db = new DB();
$db->switch();
$result = $db->first();

$results = json_encode($result);

echo $results;


if (!empty($dht) && !empty($water) && !empty($humidity) && !empty($pir)) {
} else {
    // $error = json'request failed';
    // $error = json_encode()
    // echo 'request failed';

}
$upload = new post();
$upload->insert([
    'DHT' => $dht,
    'WATER' => $water,
    'HUMIDITY' => $humidity,
    'PIR' => $pir,
    'created_at' => $date

]);
