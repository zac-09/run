<?php
//  require_once './../core/int.php ';
die('kawa');



 $db = new DB();
 $db->getData();
$result = $db->first() ;
$results = json_encode($result);

echo $results;
//  echo  json_encode($db);








?>