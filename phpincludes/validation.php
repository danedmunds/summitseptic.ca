<?php // Initialize variables to null.
$name =""; // Sender Name
$email =""; // Sender's email ID
$purpose =""; // Subject of mail
$message =""; // Sender's Message
$nameError ="";
$emailError ="";
$purposeError ="";
$messageError ="";
$successMessage =""; // On submittingform below function will execute.
if(isset($_POST['submit'])) { // Checking null values in message.
if (empty($_POST["name"])){
$nameError = "Name is required";
}
else
 {
$name = test_input($_POST["name"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name))
{
$nameError = "Only letters and white space allowed";
}
} // Checking null values inthe message.
if (empty($_POST["email"]))
{
$emailError = "Email is required";
}
else
 {
$email = test_input($_POST["email"]);
} // Checking null values inmessage.
if (empty($_POST["purpose"]))
{
$purposeError = "Purpose is required";
}
else
{
$purpose = test_input($_POST["purpose"]);
} // Checking null values inmessage.
if (empty($_POST["message"]))
{
$messageError = "Message is required";
}
else
 {
$message = test_input($_POST["message"]);
} // Checking null values inthe message.
if( !($name=='') && !($email=='') && !($purpose=='') &&!($message=='') )
{ // Checking valid email.
if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
{


$header= $name." - Summit Septic Services";
$headers[] = 'From: Summit Septic Services <pennyjoford@gmail.com>';
$emails_to = $email.", pennyjoford@gmail.com";
$msg = "Hello $name! Thank you for contacting us.

Name: $name
E-mail: $email
Purpose: $purpose
Message: $message

We have received your inquiry and will contact you as soon as possible.

Summit Septic Services
Frank Ford
pennyjoford@gmail.com
1.204.210.0158
1.204.868.0851";
$msg1 = "Name: $name
E-mail: $email
Purpose: $purpose
Message: $message "; /* Send the message using mail() function */
if(mail($emails_to, $header, $msg,implode("\r\n", $headers)))
{
$successMessage = "Message sent successfully. Confirmation email has been sent.";
}
}
else
{ $emailError = "Invalid Email";
 }
 }
} // Function for filtering input values
function test_input($data)
{
$data = trim($data);
$data =stripslashes($data);
$data =htmlspecialchars($data);
return $data;
}
?>