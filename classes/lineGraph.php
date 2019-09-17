<?php
header('Content-Type: application/json');
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/db.php";

use Carbon\Carbon;
$db = new DB();
 
$results = $db->getData();

foreach($results as $result=>$value)
{
    $time = $value->created_at;
    $value->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $time )->format("H:i A"); 
$data[] = $value;

}

print json_encode($data);



// $timestamp = $result['created_at'];
// $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp )->format("H:i A");
// echo $date;








?>
