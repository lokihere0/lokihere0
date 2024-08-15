<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'solitaryxy01@gmail.com'; // Replace with your SMTP username
    $mail->Password   = 'zjmwzuraxitiytmm'; // Replace with your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('solitaryxy01@gmail.com', 'Loki'); // Replace with your email and name
    $mail->addAddress('lokihere@protonmail.com', 'Loki'); // Replace with your email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission';
    
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Build email body
    $body = "<h1>Contact Form Submission</h1>";
    $body .= "<p><strong>Name:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Subject:</strong> {$subject}</p>";
    $body .= "<p><strong>Message:</strong> {$message}</p>";

    $mail->Body = $body;

    $mail->send();
    echo 'Your message has been sent. Thank you!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
