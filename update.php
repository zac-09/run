<?php
require_once 'core/int.php';
$user = new user();
if(!$user->isloggedin()){
redirect::to('index.php');
}
if(Input::exists()){
if(token::check(Input::get('token'))){
$validate = new validate();
$vaalidation = $validate->check($_POST,array(
'name'=>array(
    'required'=> true,
    ' min' => 3,
    'max' =>20,
    'unique'=>'users'
)

));


}
if( $validate->passed())
{
    try{
    $user->update(array(
        'username'=> input::get('name')
    ));
    session::flash('home', 'your details have been updated');
    redirect::to('index.php');

}
    catch (Exception  $e){
        die($e->getMessage());

    }
}else{
    foreach($vaalidation->error() as $errors){
        echo $errors.'<br>';
    }
}

}


?>
<form action="" method="post"> 

<div id="field">
<label for="name"> name :</label>
<input type="text" value="<?php echo $user->data()->username; ?>" name="name" id="name">
<input type="submit" value="update">
<input type="hidden" value="<?php echo token::generate(); ?>" name="token">
</div>






</form>