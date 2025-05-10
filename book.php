<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $service = htmlspecialchars($_POST['service']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                           // Use SMTP
        $mail->Host       = 'smtp.gmail.com';                        // Gmail SMTP server
        $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
        $mail->Username   = 'ghimirerupesh56@gmail.com';                   // Your Gmail address
        $mail->Password   = 'xtsy qwuj lxxu euto';                     // Your Gmail App Password (Not your Gmail password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Encryption
        $mail->Port       = 587;                                     // TCP port for TLS/STARTTLS

        // Recipients
        $mail->setFrom('yourgmail@gmail.com', 'Booking Form');       // From email address
        $mail->addAddress('ghimirerupesh56@gmail.com');              // Recipient email address (your inbox)

        // Reply-To (optional)
        $mail->addReplyTo($email, $name);                           // Reply-to email address (user's email)

        // Content
        $mail->isHTML(false);                                       // Send as plain text
        $mail->Subject = "New Booking from $name";                   // Subject line
        $mail->Body    = "Booking Details:\n" .                      // Body content
                         "Name: $name\n" .
                         "Email: $email\n" .
                         "Phone: $phone\n" .
                         "Date: $date\n" .
                         "Time: $time\n" .
                         "Service: $service";

        $mail->send();                                              // Send email
        echo "<script>alert('Thank you for booking! We will contact you soon.'); window.history.back();</script>";
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
} else {
    echo "<script>window.location.href = '/';</script>";
}
?>
