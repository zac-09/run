<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";

$dht = $_GET['dht'];
$water = $_GET['water'];
$humidity = $_GET['humidity'];
$pir = $_GET['pir'];

$upload = new post();
$upload->insert([
    'DHT' => $dht,
    'WATER' => $water,
    'HUMIDITY' => $humidity,
    'PIR' => $pir

]);








?>