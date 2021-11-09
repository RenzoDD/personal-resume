<?php
/*
 * Copyright 2021 (c) Renzo Diaz
 * Licensed under MIT License
 * Implementation of PHP Mailer
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';

class Mailer
{
    private $fromEmail;
    private $fromName;
    private $fromPass;

    public function __construct($fromEmail, $fromPass, $fromName = "")
    {
        $this->fromEmail = $fromEmail;
        $this->fromName  = $fromName;
        $this->fromPass  = $fromPass;
    }
    function Send($to, $subject, $body)
    {
        $mail = new PHPMailer(true);
        
        try
        {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
        
            $mail->Host = "smpt.example.com";
            $mail->Port = 465;
            $mail->SMTPSecure = "ssl";
            
            $mail->Username = $this->fromEmail;
            $mail->Password = $this->fromPass;

            $mail->setFrom($this->fromEmail, $this->fromName);
            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();
        }
        catch (Exception $e) {  return false; }
    }
}
?>