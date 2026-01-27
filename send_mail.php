<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'gohar.zafar123@gmail.com';
    $mail->Password   = 'dwewzsizlbmhqtnn';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Email content
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('gohar.zafar123@gmail.com');

    $mail->Subject = $_POST['subject'];
    $mail->Body    =
        "Name: " . $_POST['name'] . "\n" .
        "Email: " . $_POST['email'] . "\n\n" .
        "Message:\n" . $_POST['message'];

    $mail->send();
    echo "Message sent successfully!";
} catch (Exception $e) {
    echo "Message failed: {$mail->ErrorInfo}";
}
