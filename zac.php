<?php
require_once './core/int.php ';
$db = new DB();





// Reads the variables sent via POST from this API gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

switch ($text){
 case  "1" : // region selection for health centres
 $response  = "CON Choose your Region  \n";
	 $response .= "1. Central \n";
   $response .= "2. western \n";
   $response .= "3. Eastern \n";
   $response .= "4. northern";
   
  
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
 $response  = "CON Choose your Region \n";
	 $response .= "1. Central \n";
   $response .= "2. western \n";
   $response .= "3. Eastern \n";
   $response .= "4. northern";
   
  
  break;
  case  "2*2*1*1" :// returns district in central region for goats in particular
  $response  = "CON pick a district \n";
 $querry = $db->query("SELECT district_name FROM districts WHERE region = ?",array('central'));
    $resultse = $db->result();
    $n = 1;
 foreach($resultse as $result=>$value){
 $response .= "$n. $value->district_name \n";  
 
 $n++;
 }
   
   break;

  case  "1*1" :// returns district in central region
 $response  = "CON pick a district \n";
$querry = $db->query("SELECT district_name FROM districts WHERE region = ?",array('central'));
   $resultse = $db->result();
   $n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->district_name \n";  

$n++;
}
  
  break;
  case  "1*2" :// returns districts in western region
  $response  = "CON pick a district \n";
  $querry = $db->query("SELECT district_name FROM districts WHERE region = ?",array('western'));
     $resultse = $db->result();
     $n = 1;
  foreach($resultse as $result=>$value){
  $response .= "$n. $value->district_name \n";  
  
  $n++;
  }
  break;

  case  "1*3" :// returns districts in eastern region
  $response  = "CON pick a district \n";
  $querry = $db->query("SELECT district_name FROM districts WHERE region = ?",array('eastern'));
     $resultse = $db->result();
     $n = 1;
  foreach($resultse as $result=>$value){
  $response .= "$n. $value->district_name \n";  
  
  $n++;
  }
  break;

  case  "1*4" : //returns districts in nothern region
  $response  = "CON pick a district \n";
   $querry = $db->query("SELECT district_name FROM districts WHERE region = ?",array('northern'));
     $resultse = $db->result();
     $n = 1;
  foreach($resultse as $result=>$value){
  $response .= "$n. $value->district_name \n";  
  
  $n++;
  }
  break;





   case  "1*1*1" :// returns contacts for health centres in kampala
   $response  = "END these are the contacts we could find in your region\n";

   $querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('kampala'));
   $resultse = $db->result();
   $n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;

case  "1*1*2" :// returns contacts for health centres in mukono
$response  = "END these are the contacts we could find in your region\n";

$querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('mukono'));
$resultse = $db->result();
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}


  
  break;


  case  "1*1*3" :// returns contacts for health centres in masaka
  $response  = "END these are the contacts we could find in your region\n";

  $querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('masaka'));
  $resultse = $db->result();
  $n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;
case  "1*1*4" :// returns contacts for health centres in mpigi
$response  = "END these are the contacts we could find in your region\n";

$querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('mpigi'));
$resultse = $db->result();
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;
case  "1*2*1" :// returns contacts for health centres in mbarara
$response  = "END these are the contacts we could find in your region\n";

$querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('mbarara'));
$resultse = $db->result();
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;

case  "1*2*2" :// returns contacts for health centres in kabale
$response  = "END these are the contacts we could find in your region\n";

$querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('kabale'));
$resultse = $db->result();
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;

case  "1*3*1" :// returns contacts for health centres in karamoja
$response  = "END these are the contacts we could find in your region\n";

$querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('karamoja'));
$resultse = $db->result();
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;

 case  "1*3*2" :// returns contacts for health centres in nakapiripiriti
$response  = "END these are the contacts we could find in your region\n";

$querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('nakapiripiriti'));
$resultse = $db->result();
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;

case  "1*4*1" :// returns contacts for health centres in jinja
$response  = "END these are the contacts we could find in your region\n";

$querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('jinja'));
$resultse = $db->result();
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;

case  "1*4*2" :// returns contacts for health centres in busia
$response  = "END these are the contacts we could find in your region\n";

$querry = $db->query("SELECT * FROM contacts_health_centres WHERE district = ?",array('busia'));
$resultse = $db->result();
$n = 1;
foreach($resultse as $result=>$value){
$response .= "$n. $value->contact_name  you can call on $value->phone_number  \n";  

$n++;
}
break;
  case  "1" :

  
  break;
  case  "1" :

  
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