<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/post.php";

$switch_1 = $_POST['switch_1'];
$switch_2 = $_POST['switch_2'];
$switch_3 = $_POST['switch_3'];
$switch_4 = $_POST['switch_4'];




$upload = new switch_db();
$upload->insert([
    'relay_1' => $switch_1,
    'relay_2' => $switch_2,
    'relay_3' => $switch_3,
    'relay_4' => $switch_4

]);


?>