<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    // Gmail SMTP credentials
    $mail->Username = 'hackerhub8.info@gmail.com';     
    $mail->Password = '';       
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender & receiver
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('hackerhub8.info@gmail.com'); 

    // Email content
    $mail->isHTML(false);
    $mail->Subject = $_POST['subject'];
    $mail->Body = "Name: {$_POST['name']}\n"
            . "Email: {$_POST['email']}\n"
            . "Phone: {$_POST['phone']}\n\n"
            . "Message:\n{$_POST['message']}";


    $mail->send();
    echo '✅ Message sent successfully!';
} catch (Exception $e) {
    echo "❌ Mail error: {$mail->ErrorInfo}";
}
?>
