    <?php
require_once './core/int.php ';





if(Input::exists())
{
   
    if(token::check(Input::get('token'))){
    $validate = new validate();
    $validation = $validate->check($_POST, array(

        'username'=> array(
        'required' => true,
       ' min ' => 3,
       'max' =>20,
       'unique'=>'users'
        ),

        'password' =>array(
            'required' => true,
            'min' => 6
        ),

        'password_again' => array(
            'required' => true,
            'matches'=> 'password'),
            'name'=> array(
                'required' => true,
            'min' => 4
            )

        )




        );
if($validate->passed()){
    

$user = new user();

try{

     $salt = harsh::salt(32); 

   
$user->create(array(
    'username'=>input::get('username'),
    'password'=>harsh::make(Input::get('password'),$salt),
    'salt'=>$salt,
    'joined'=>date('Y-m-d H:i:s'),
    'name'=>input::get('name'),
    'groups'=>1
    
));
session::flash('home','you have been registered');

redirect::to('index.php');


}
catch(Exception $e){
die($e->getMessage());

}


}else{
    foreach($validate->error() as $error){
        echo $error .'<br>';
    }
}


    }}
    
    
?>

<form action="" method ="post">
<div id="field">
<label for="username">username</label>
<input type="text" name ="username" id="username" autocomplete="off" value="<?php  echo Input::get('username');?>">
</div>

<div id="field">
<label for="password">enter password</label>
<input type="password" name =" password" id="password"  value="">
</div>

<div id="field">
<label for="password_again">password_again</label>
<input type="password" name ="password_again" id="password_again"  value="" autocomplete="off">
</div>
     
<input type="hidden" name="token" value="<?php echo token::generate();   ?>">

<div id="field">
<label for="name">name</label>
<input type="text" name ="name" id="name" autocomplete="off" >
</div>
<input type="submit" value="register ">
</form>
