<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/db.php";

 $db = new DB();
 $db->switch();
$result = $db->first() ;

 $results = json_encode($result);

echo $results;
 








?>