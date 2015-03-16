<?php
ob_start();

$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mailout.one.com';  // Specify main and backup SMTP servers
$mail->From = "$email";
$mail->FromName = "$name";
$mail->addAddress('j.cowan4866@student.leedsbeckett.ac.uk');               // Name is optional
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = "Contact";
$mail->Body    = "$comments";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    
    echo 'Message has been sent';
}
header('location:index.php');


?>


