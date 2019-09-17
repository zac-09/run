<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/int.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/db.php";
class post{
protected $_db;


public function insert($fields = array() ){

$this->_db = new DB();
$this->_db->insert('sensors',$fields);


}







}















?>