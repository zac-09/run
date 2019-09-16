<?php
require_once 'core/int.php';

 if(session::exists('home'))
{
    echo session::flash('home');

}


$user = new user();

if($user->isloggedin()){
    ?>
   <p>Welcome <a href="#" >  <?php echo $user->data()->username; ?> </a></p>
  <ul>
  <li> <a href ="logout.php" >logout </a> </li>
  <li> <a href ="update.php" >update infromation </a> </li>
  <li> <a href ="changePassword.php" >changePassword </a> </li>
  </ul>
   <?php
}else{
echo 'you need to <a href="login.php">login</a> or <a href="register.php">register</a>';
}

?>