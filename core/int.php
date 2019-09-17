<?php
require_once './../classes/config.php';

session_start();

$GLOBALS['config']= array(
'mysql'=>array(
    'host'=>'localhost',
    'db'=> 'zac',
   'username'=>'zac',
   'password'=>'1999angella',
   
),
'cokie'=> array(
'cokie_name'=> 'hash',
'cokie_expiry'=>'604888'

),
'session'=>array(
    'session_name'=> 'user',
    'token_name'=> 'token'
)


);

spl_autoload_register(function ($class){
    require_once '../classes/'.$class.'.php';
});
if(cookie::exists(config::get('cokie/cokie_name')) && !session::exists(config::get('session/session_name'))){
$harsh = cookie::get(config::get('cookie/cokie_name'));
$harsh_check= new DB();
$harsh_check->get('users_session','=',$harsh);
if($harsh->count()){
    $user = new user($harsh_check->first()->user_id);
    $user->logup();
}
}



require_once './../functions/sanitize.php';

?>