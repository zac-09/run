<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/db.php";
use Carbon\Carbon;

 $db = new DB();
 $db->getData();
 foreach($db as $result=>$value)
{
    $time = $value->created_at;
    // $value->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $time )->format("H:i A"); 
    $value->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $time )->diffForHumans(['parts' => 3, 'join' => true]); 
$data[] = $value;

}
// $result = $db->first() ;

 $results = json_encode($data);

echo $results;
 








?>