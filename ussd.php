<?php
require_once 'core/int.php ';
$db = new DB();
// Reads the variables sent via POST from our gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
if(preg_match("/[a-zA-Z]/",$text)){
  $response = $db->contact($text);
}

if ( $text == "" ) {
	 // This is the first request. Note how we start the response with CON
	 $response  = "CON Welcome please select a language \n";
	 $response .= "1. English \n";
	 $response .= "2. Luganda";
}else if ( $text == "1" ) {
  // Business logic for first level response
  $response = "CON please type in your location \n";
  
  
}else if($text == "2") {
 
  // Business logic for first level response
  // This is a terminal request. Note how we start the response with END
  $response = "CON Tekamu jobera ";
 
}
// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');
echo $response;
// DONE!!!
?>