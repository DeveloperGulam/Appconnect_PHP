<?php
set_time_limit(900000);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
// $to = "gulamgaus156@gmail.com";
// $from = "gulam.gaus@zorang.com"; // this is the sender's Email address
//                   $subject = "NIGP App Connect Response";
//                   $message = "Hi Team, <br/>There is a problem with your file.<br/>Please contact with Astha.<br/><br/>Regards,<br/>Zorang Team";

//                   //standard mail headers
//                   $headers = "From: Gulam Gaus ".$from."\r\n";
//                   $headers .= "MIME-Version: 1.0\r\n";
//                   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//                   mail($to,$subject,$message,$headers);

//                   die;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;    
    $mail->SMTPSecure = 'tls';                                //Enable SMTP authentication
    $mail->Username   = 'gulam.gaus@zorang.com';                     //SMTP username
    $mail->Password   = 'gulam.gaus@275';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('gulam.gaus@zorang.com', 'Gulam Gaus');
    $mail->addAddress('gulamgaus156@gmail.com', 'Joe User');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'NIGP App Connect';
    $mail->Body    = 'Hi Team, <br/>AppConnect Designer has completed the integration for NIGP Chapter 1.<br/>Please find the attached result file for more details.<br/><br/>Regards,<br/>Zorang Team';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $res = $mail->send();
    if($res){
        echo 'Message has been sent';
    }
    else {
        print_r($res);
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}