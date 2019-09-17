<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/db.php";
echo 'im alright'; 

 $db = new DB();
 $db->getData();
$result = $db->first() ;

 $results = json_encode($result);

 echo $results;
  echo  json_encode($db);








?>