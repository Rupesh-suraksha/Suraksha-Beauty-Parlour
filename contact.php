<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                           // Use SMTP
        $mail->Host       = 'smtp.gmail.com';                        // Gmail SMTP server
        $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
        $mail->Username   = 'ghimirerupesh56@gmail.com';                   // Your Gmail address
        $mail->Password   = 'xtsy qwuj lxxu euto';                     // Your Gmail App Password (not your Gmail password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Encryption (TLS)
        $mail->Port       = 587;                                     // Port for Gmail's SMTP server

        // Recipients
        $mail->setFrom($email, $name);                               // Sender's email address and name
        $mail->addAddress('ghimirerupesh56@gmail.com');              // Recipient's email address

        // Content
        $mail->isHTML(false);                                       // Send as plain text
        $mail->Subject = "New Contact Message from $name";            // Subject line
        $mail->Body    = "Message Details:\n" .                      // Body content
                         "Name: $name\n" .
                         "Email: $email\n" .
                         "Message:\n$message";

        // Send email
        if ($mail->send()) {
            echo "<script>alert('Thank you for contacting us! We will reply soon.'); window.history.back();</script>";
        } else {
            echo "<script>alert('Sorry, there was an error sending your message. Please try again.'); window.history.back();</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
} else {
    echo "<script>window.location.href = '/';</script>";
}
?>
