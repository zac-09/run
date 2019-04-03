<?php
require_once 'core/int.php';
$user = new user();

if(Input::exists()){
    if(token::check(Input::get('token'))){
        $validate = new validate();
        $validation= $validate->check($_POST,array(
            'current_password'=>array(
               "required"=>true 
            ),
            'New_password'=>array(
                "required"=>true,
                'min'=>6
            ),
            'new_password_again'=>array(
                "required"=>true,
                "matches"=>'New_password' 
             )


        ));
        if($validate->passed()){
                if(harsh::make(Input::get('current_password'),$user->data()->salt)===$user->data()->password){
                    $salt= harsh::salt(32);
                  
                    $user->update(array(
                    'password'=>harsh::make(Input::get('New_password'),$salt
                    
                   ),
                   'salt'=>$salt
                ));
                   session::flash('home','your password has been changed');
                   redirect::to('index.php');
                }else{
                    echo 'current password is wrong';
                }
        }else{
            foreach($validate->error() as $error){
                echo $error.'<br>';
            }
        }
    }

}












?>
<form action=""method="post" >
<div id="field">
<label for="CurrentPassword"> CurrentPassword
<input type="password" name= "current_password" id="current_password">
</label>
</div>

<div id="field">
<label for="NewPassword">NewPassword
<input type="password" name= "New_password" id="New_password">
</label>
</div>
<div id="field"> 
<label for="NewPassword">NewPasswordAgain
<input type="password" name= "new_password_again" id="new_password_again">

</label>
<input type="hidden" name="token" value="<?php echo token::generate();?>">
</div>
<input type="submit" value="change">
</form>