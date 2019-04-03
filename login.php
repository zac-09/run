<?php
require_once 'core/int.php';
if(Input::exists()){

if(token::check(Input::get('token'))){
$validate= new validate(); 
 $validation = $validate->check($_POST,array(
'username'=>array(
'required'=>true


),
'password'=>array(
    'required'=>true
)

));
if( $validate->passed()){
    $remember = (Input::get('remember'))==='on'? true:false ;
    $login = new user();
    $login = $login->logup(Input::get('username'),Input::get('password'),$remember);
   
    if($login)
{
     redirect::to('index.php');
}else{
    echo 'sorry we could not log you  in';
}
}
else
 {
    foreach($validation->error() as $error){
        echo $error. '<br>';

    }
}








}
}







?>


<form action="" method="post">

<div id = "field">
<label for="username">username</label>
<input type="text" name="username" id="username" autocomplete="off">

</div>



<div id="field">
<label for="password">Password</label>
<input type="password" name="password" id="password">

<div> 
<label for="remember">
<input type="checkbox" name="remember" id="remember">Remember Me
</label>
</div>

</div>
<input type="submit" value="login in">
<input type="hidden" name="token" value="<?php echo token::generate();  ?>">
</form>