<?php
header('Content-Type: application/json');
require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/db.php";

use Carbon\Carbon;
date_default_timezone_set('Africa/Kampala');
// $db = new DB();
 
// $results = $db->getAll();

// foreach($results as $result=>$value)
// {
//     $time = $value->created_at;
//     // $value->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $time )->format("H:i A"); 
//     $value->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $time )->diffForHumans(); 
// $data[] = $value;

// }


// print json_encode($data[0]);
printf("Right now is %s", Carbon::now()->toDateTimeString());


// $timestamp = $result['created_at'];
// $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp )->format("H:i A");
// echo $date;








?>
