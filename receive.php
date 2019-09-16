<?php
require_once './core/int.php ';
$db = new DB();





//Reads the variables sent via POST from this API gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];




if(preg_match("[a-z]",$text)){
  // response logic here
$db->contact($text);



  
}
else{
  if($text =="")
  {
    $response  = "CON Welcome select a language \n";
    $response .= "1. English \n";
    $response .= "2. Luganda\n";
    $response .=" 3. runyakore";
  }else if($text=="1"){
    $response .= "CON type your location";
  }else if($text =="2"){
    $response .= "CON tekamu wobeera";
  }else if($text=="3"){
    $response .= "CON obera wa?";
  }

// switch ($text){
 
//    case 2 :
//    $response .= "CON tekamu wobeera";
//    break;
//    case 1 :
//    $response .= "CON type your location";
//    break;
//    case 3:
//    $response .= "CON obera wa?";
//    break;
 


  





//   default:
//   $response  = "CON Welcome select a language \n";
//   $response .= "1. English \n";
//   $response .= "2. Luganda\n";
//   $response .=" 3. runyakore";
//   break;
// }
 }






// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');

echo $response;

// DONE!!!
?>