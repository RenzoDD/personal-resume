<?php
if (isset($_POST["name"],$_POST["email"],$_POST["subject"],$_POST["message"]) === false)
{
    echo "Undefined variables";
    return;
}

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require_once __DIR__ . "/libs/Mailer.php";

$mail = new Mailer("no-reply@example.com", "password", "$name");

$email_message  = "<h3>New contact from your Resume Web Site</h3>";
$email_message .= "<p>";
$email_message .= "Name: $name";
$email_message .= "</p>";
$email_message .= "<p>";
$email_message .= "Email: $email";
$email_message .= "</p>";
$email_message .= "<p>";
$email_message .= "Subject: $subject";
$email_message .= "</p>";
$email_message .= "<hr>";
$email_message .= "<p>";
$email_message .= $message;
$email_message .= "</p>";
$email_message .= "<hr>";
$email_message .= "<p>";
$email_message .= "Date: " . date("M jS, Y - H:j:s") . " UTC";
$email_message .= "</p>";

$mail->Send("your.email@example.com", "New contact from your Resume Web Site", $email_message);
echo "OK";
return;
?>