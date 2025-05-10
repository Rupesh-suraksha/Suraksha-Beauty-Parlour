<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $date = htmlspecialchars($_POST['date']);
  $time = htmlspecialchars($_POST['time']);
  $service = htmlspecialchars($_POST['service']);

  $to = "youremail@example.com"; // Replace with your email address
  $subject = "New Booking from $name";
  $message = "Booking Details:\n" .
             "Name: $name\n" .
             "Email: $email\n" .
             "Phone: $phone\n" .
             "Date: $date\n" .
             "Time: $time\n" .
             "Service: $service";

  $headers = "From: $email";

  if (mail($to, $subject, $message, $headers)) {
    echo "<script>alert('Thank you for booking! We will contact you soon.'); window.history.back();</script>";
  } else {
    echo "<script>alert('Sorry, there was an error sending your booking. Please try again.'); window.history.back();</script>";
  }
} else {
  echo "<script>window.location.href = '/';</script>";
}
?>
