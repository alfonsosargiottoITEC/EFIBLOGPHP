<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// MONOLOG
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
// create a log channel
// $log = new Logger('efiphpblog@gmail.com');
// $log->pushHandler(new StreamHandler('/home/alfonso/php/web/efiPHP-Sargiotto/logs/emailsend.log', Logger::WARNING));
// add records to the log
// $log->warning('Enviado?');
// $log->error('error de algo');
// Load Composer's autoloader
require 'vendor/autoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
//Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
$mail->isSMTP(); // Send using SMTP
$mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'efiphpblog@gmail.com'; // SMTP username
$mail->Password = 'sargiottophp2019'; // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
$mail->Port = 587; // TCP port to connect to
//Recipients
$mail->setFrom('efiphpblog@gmail.com', 'EFI PHP BLOG');
$mail->addAddress($email, 'New User'); // Add a recipient
// $mail->addAddress('ellen@example.com'); // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');
// Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
// $mail->addAttachment('/home/alfonso/php/web/primerComposer/img/sea_turtle.jpg', 'fotodemiperfil2.jpg'); // Optional name
// Content

$mail->isHTML(true); // Set email format to HTML
$mail->Subject = 'Congrats! You are successfully registered! ';
$mail->Body = '<html><p>Welcome to EFI PHP BLOG! If you received this email it means you are now part of EFI PHP BLOG community!
Thanks for joining us! Here is your information.</p></br>'.
 '<p>Firstname: '.$firstname.'</p>'.
 '<p>Lastname: '.$lastname .'</p>'.
 '<p>Email: '.$email.'</p>'.
 '<p>Password: '.$password.'</p>'.
 '</html> ';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
ob_start();
$mail->send();
ob_get_clean();
echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>