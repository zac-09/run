<?php
require_once '../core/int.php ';
class post{
protected $_db;


public function insert($fields = array() ){

$this->_db = new DB();
$this->_db->insert('sensors',$fields);


}







}















?>