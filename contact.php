<?php
  $errors = '';
$myemail = 'jaswebmates@gmail.com';//<-----Put Your email address here.
if(empty($_GET['name'])  || 
   empty($_GET['email']) || 
   empty($_GET['phone']) ||
   empty($_GET['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_GET['name']; 
$email_address = $_GET['email'];
$phone = $_GET['phone'];
$message = $_GET['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}


if( empty($errors))

{

$to = $myemail;

$email_subject = "$name";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $name \n ".

"Phone Number:\n $phone \n ".

"Email: $email_address\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);

//redirect to the 'thank you' page

header('Location: contact-us-recaptcha.html');

}


?>
