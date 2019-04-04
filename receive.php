<?php
require_once './core/int.php ';
$db = new DB();





// Reads the variables sent via POST from this API gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];


$text = "2*1";

if(preg_match("[]",$text)){
  // response logic here
  return;
}

switch ($text){
 case  "1" : // input district
 $response  = "CON type your district \n";
	
   
  
  break;

  case  "2" : // category selection for agricultural inputs
  $response  = "CON Choose your agricultural input \n"; 
  $response .= "1. crops \n";
  $response .= "2. animals";
  
  break;
  case  "2*2" ://selection of an  animal
  $response  = "choose an animal \n";
	 $response .= "1. goats \n";
   $response .= "2. chicken \n";
   $response .= "3. cows \n";
   $response .= "4. sheep \n";
   $response .= "5. others";
  
  break;

  case  "2*1" ://selection of a crop
  $response  = "choose a crop\n";
	 $response .= "1. maize \n";
   $response .= "2. beans \n";
   $response .= "3. bananas \n";
   $response .= "4. casava \n";
   $response .= "5. potatoes \n";
   $response .= "6. others";
  
  break;


  case  "2*2*1" : // region selection for goats
 $response  = "CON type your district \n";
	 
  
  break;
  case  "2*2*1" :// returns contacts in  region for goats in particular
  $response  = $db->contact_more($text);
 
   
   break;

   case  "2*2*2" : // region selection for chicken
 $response  = "CON type your district \n";
	 
  
  break;
  case  "2*2*2" :// returns contacts in  region for chicken in particular
  $response  = $db->contact_more($text);
 
   
   break;
   case  "2*2*3" : // region selection for cows
 $response  = "CON type your district \n";
	 
  
  break;
  case  "2*2*3" :// returns contacts in  region for cows in particular
  $response  = $db->contact_more($text);
 
   
   break;
   case  "2*2*4" : // region selection for sheep
   $response  = "CON type your district \n";
     
    
    break;
    case  "2*2*4" :// returns contacts in  region for sheep in particular
    $response  = $db->contact_more($text);
   
     
     break;
  case  "1" :// returns contacts in specified district
      $response = $db->contact($text);
  break;

  





  default:
  $response  = "CON Welcome choose a service \n";
  $response .= "1. health centres \n";
  $response .= "2. agricultural inputs";
  break;
}
 






// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');

echo $response;

// DONE!!!
?>