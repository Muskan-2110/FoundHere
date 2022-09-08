<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'joshianand287@gmail.com';                     //SMTP username
    $mail->Password   = 'nfphpfibhoayptwl';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('no-reply@cpdl.com', 'Mailer');
    //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress($founder_mail);               //Name is optional
    $mail->addReplyTo('joshianand287@gmail.com', 'foundhere');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'NOTIFICATION FROM FOUNDHERE';
    $mail->Body    = 'Hi, we are from foundhere team ,the document that you found has been requested by someone .Here we are giving you the E-mail ID of respective person kindly interact with the person who lost it.The E-mail ID is '.$email.' ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail client';

    $mail->send();
    //echo 'Message has been sent';
    $is_sent=1;
}catch (Exception $e) {
  //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>