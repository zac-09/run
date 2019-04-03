<?php
require_once './core/int.php ';



class DB{
private static $_instance = null;
 private 
 $_query,
 $_result,
 $_pdo,
 $_count=0,
 $_error =false;
 
 public function __construct(){


    $host = config::get('mysql/host');
    $username = config::get('mysql/username');
    $password = config::get('mysql/password');
    $db = config::get('mysql/db');

    try {
$this->_pdo = new PDO('mysql:host='.$host.';dbname='.$db.'',$username,$password);

    }
    catch (PDOException $e)
    {

        die($e->getMessage());

    }




 }

public static function getinstance (){
if(!isset(self::$_instance)){

self::$_instance= new DB;

}

else{
    return self::$_instance;
}

}


public  function query ($sql, $params = array())
{
    $this->_error = false;
if($this->_query= $this->_pdo->prepare($sql))
{
$x=1;
    if(count($params))
    {
        foreach($params as  $param){
            $this->_query->bindValue($x,$param);
            $x++;

        }

    }

if($this->_query->execute()){
    $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
    $this->_count = $this->_query->rowCount();


}
else {
    $this->_error = true;
}
}

return $this;

}
public function action($action,$table,$where = array()){
if(count($where) === 3)
{
    $operators= array('<', '>', '<=', '>=', '=');
    $field = $where[0];
    $operator = $where[1];
    $value = $where[2];

    if(in_array($operator,$operators)){
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? ";

        if(!$this->query($sql,array($value))->error()){
            return $this;
        }



    }
}
return false;
}

public function get($table,$where){
    return $this->action('SELECT *', $table,$where);

}
public function result(){
    return $this->_result;
}
public function delete($table,$where){
    return $this->action('DELETE', $table,$where);

}
public function insert($table, $fields = array()){
if(count($fields)){
$keys = array_keys($fields);
$values = null;

$x = 1;

foreach($fields as $field)
    {
$values .= '?';

if($x < count($fields))
{
$values .= ' , ';
}
$x++;
    }
    $sql = "INSERT INTO {$table}(`".implode('`,`',$keys)."`) VALUES({$values})";
    if(!$this->query($sql,$fields)->error()){
        return true;
    }
}
return false;
}
public function update($table, $id, $fields){

$set = '';
$x = 1;
foreach ($fields as $name => $value){
$set .= "{$name} = ?";

if ($x < count($fields)){
    $set .= ", ";
}

$x++;
}

$sql = "UPDATE {$table} SET {$set} WHERE id = {$id} ";

if(!$this->query($sql,$fields)->error()){
    return true;
}
return false;

}









public function error(){

    return $this->_error;
}
public function first(){
    return $this->result()[0];
}

public function count(){
    return $this->_count;
}

public function contact($text){
    preg_match("//",$text);
$text_new = explode("*", $text);
$new_text = strtolower($text_new[1]);

$sql =  "SELECT * FROM contacts_health_centres WHERE district=?";
$querry =$this->query($sql,array($new_text));

$resultse = $this->result();
$response = '';
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
return $response;
}
public function contact_more($text){
    $text_new = explode("*", $text);
$new_text = strtolower($text_new[1]);

$sql =  "SELECT * FROM contacts_agricultural_inputs WHERE district=?";
$querry =$this->query($sql,array($new_text));

$resultse = $this->result();
$response = '';
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
return $response;
}


}







?>