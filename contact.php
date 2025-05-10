<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  $to = "ghimirerupesh56@gmail.com"; // Replace with your email address
  $subject = "New Contact Message from $name";
  $body = "Message Details:\n" .
          "Name: $name\n" .
          "Email: $email\n" .
          "Message:\n$message";

  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "<script>alert('Thank you for contacting us! We will reply soon.'); window.history.back();</script>";
  } else {
    echo "<script>alert('Sorry, there was an error sending your message. Please try again.'); window.history.back();</script>";
  }
} else {
  echo "<script>window.location.href = '/';</script>";
}
?>
