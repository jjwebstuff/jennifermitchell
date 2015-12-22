<?php  

//this is something new that should be uploaded

// check for form submission - if it doesn't exist then send back to contact form  
if (!isset($_POST["save"]) || $_POST["save"] != "contact") {  
    header("Location: ../../contact.php?e=Please Submit Infomation Again"); exit;  
}  
      
// get the posted data  
$name = $_POST["contact_name"];  
$email_address = $_POST["contact_email"];  
$phone_number = $_POST["contact_phone"];  
$message = $_POST["contact_message"];  
      
// check that a name was entered  
if (empty ($name))  
    $error = "Please Add a name";  
// check that an email address was entered  
elseif (empty ($email_address) && empty ($phone_number))   
    $error = "Please enter an email address or phone number";  
// // check for a valid email address  
// elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email_address))  
//     $error = "Please enter a valid email address";  
// check that a message was entered  
elseif (empty ($message))  
    $error = "Please enter a message";  
          
// check if an error was found - if there was, send the user back to the form  
if (isset($error)) {  
    header("Location: ../../contact.php?e=".urlencode($error) . "#contact"); exit;  
}  
          
// write the email content  
$email_content = "Name: $name\n";  
$email_content .= "Email Address: $email_address\n";  
$email_content .= "Phone Number: $phone_number\n";  
$email_content .= "Message:\n\n$message";  
      
// // create email headers
// // $email_from = "new@integrityremodelingservices.biz";

// $headers = 'From: webmaster@yourdot.com' . "\r\n" .
//    'Reply-To: webmaster@yourdot.com' . "\r\n" .
//    'X-Mailer: PHP/' . phpversion();

// send the email  
mail ("jennefer@jennefermitchell.com", "New Contact Message", $email_content);  
      
// send the user back to the form  
header("Location: ../../contact.php?s=".urlencode("Thank you for your message, we'll be in touch soon!") . "#contact"); exit;  
  
?> 