<?php
$errorMSG = "";
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}
$EmailTo = "contact@your-email-address.com";
$Subject = "New Newsletter Subscriber";

// prepare email body text
$Body = "";
$Body .= "\n";
$Body .= "Email address: ";
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}