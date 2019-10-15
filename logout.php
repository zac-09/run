<?php
require_once 'core/int.php';
$user = new user();
$user->logout();
redirect::to('index.php');








?>