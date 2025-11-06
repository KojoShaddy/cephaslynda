<?php

// Set the recipient email address
$to = "satelliton22@gmail.com";

// Collect form data from the request
$from = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
$name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
$number = filter_var($_REQUEST['number'], FILTER_SANITIZE_STRING);

// Validate the email address
if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// Prepare email headers
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Set the email subject
$subject = "New Wedding Invitation Form Filled";

// Prepare the HTML email body
$logo = 'images/logo.png';
$link = '#';

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
$body .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
$body .= "<a href='{$link}'><images src='{$logo}' alt='Logo'></a><br><br>";
$body .= "</td></tr></thead><tbody>";
$body .= "<tr><td style='border:none;'><strong>Name:</strong> {$name}</td></tr>";
$body .= "<tr><td style='border:none;'><strong>Email:</strong> {$from}</td></tr>";
$body .= "<tr><td style='border:none;'><strong>Phone Number:</strong> {$number}</td></tr>";
$body .= "</tbody></table>";
$body .= "</body></html>";

// Send the email and check if it's successful
if (mail($to, $subject, $body, $headers)) {
    // Redirect to the thank you page upon successful email
    header('Location: thank-you.html');
} else {
    // Handle email sending failure
    die("Sorry, your email could not be sent. Please try again later.");
}

?>