<?php
class redirect{
public static function to($location){

if($location){

    if (is_numeric($location)){
        switch($location){
            case 404:
            header("HTTP 1.0 404 Not found");
            include 'includes/errors/404.php';
            exit();



        }


    }
    header('Location: '.$location);
    exit();
}





}






}




?>