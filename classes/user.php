<?php
require_once './core/int.php ';
class user{
private $_db, 
        $_data,
        $_cokie_name,
        $_session_name,
        $_isloggedin;

public function __construct($user =null)
{
    
    $this->_db = new DB();
    $this->_session_name = config::get('session/session_name');
    if(!$user){
        if(session::exists($this->_session_name)){
            $user = session::get($this->_session_name);
            if ($this->findusername($user)){
                $this->_isloggedin = true;
            }else{
 
            }
        }



    }else{
        $this->findusername($user);

    }


}


public function create($fields = array()){


if(!$this->_db->insert('users',$fields)){

throw new Exception("user could not be registered successfully");


}

}

public function findusername($username=null){
if($username){
$field = (is_numeric($username)) ?'id':'username';
$data = $this->_db->get('users',array($field, '=',$username));
if($data->count()){
$this->_data = $data->first();
return true;
}

}
return false;

}
public function logup($username = null, $password = null,$remember=false){
    if(!$password && !$username){
        session::put($this->_session_name,$this->data()->id);
    }
        else{
    $user = $this->findusername($username);
    if($user){
        if($this->data()->password === harsh::make($password,$this->data()->salt) ){
          session::put($this->_session_name,$this->data()->id);
                if($remember){
                    $harsh = harsh::unique();
                    $harsh_check = $this->_db->get('users_session', array('user_id', '=' ,$this->data()->id));
                    if(!$harsh_check->count()){
                        $this->_db->insert('users_session',array(
                            'user_id'=>$this->data()->id,
                            'harsh'=> $harsh

                        ));
                    }else{
                        $harsh = $harsh_check->first()->harsh;
                    }
                    cookie::put($this->_cokie_name,$harsh,config::get('cokie/cokie_expiry'));
                }
            return true;
        }
        else{
        return false;
        }

    }else {
        echo 'user does not exist';
    }
}
    return false;
}

public function data(){
    return $this->_data;
}
public function isloggedin(){
    return $this->_isloggedin;
}

public function logout(){
    session::delete($this->_session_name);
    cookie::delete(config::get('cokie/cokie_name'));
    $this->_db->delete('users_session', array('user_id', '=',$this->data()->id));
}
public function update($fields =array(),$id=null){
    if(!$id && $this->isloggedin() ){
        $id = $this->data()->id;
    }
    if(!$this->_db->update('users',$id,$fields)){
        
    throw new Exception('there was a problem updating');

    }
}
}

?>


