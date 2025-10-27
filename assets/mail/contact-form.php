<?php
// Get form data
$conName = isset($_POST['conName']) ? trim($_POST['conName']) : '';
$conLName = isset($_POST['conLName']) ? trim($_POST['conLName']) : '';
$conEmail = isset($_POST['conEmail']) ? trim($_POST['conEmail']) : '';
$conPhone = isset($_POST['conPhone']) ? trim($_POST['conPhone']) : '';
$conService = isset($_POST['conService']) ? trim($_POST['conService']) : '';
$conMessage = isset($_POST['conMessage']) ? trim($_POST['conMessage']) : '';

// Basic validation
if (empty($conName) || empty($conEmail) || empty($conMessage)) {
  echo "N";
  exit;
}

// Validate email
if (!filter_var($conEmail, FILTER_VALIDATE_EMAIL)) {
  echo "N";
  exit;
}

// Set the recipient email address
$recipient = "info@alphagreenlp.com";

// Set the email subject
$subject = "New Contact Form Submission from " . $conName . " " . $conLName;

// Email Header
$head = "You have a new message from AlphaGreen Professionals LP Contact Form\n";
$head .= "==============================================================\n";

// Build the email content
$form_content = $head . "\n";
$form_content .= "Contact Details:\n";
$form_content .= "---------------\n";
$form_content .= "Full Name: " . $conName . " " . $conLName . "\n";
$form_content .= "Email: " . $conEmail . "\n";
$form_content .= "Phone: " . $conPhone . "\n";
$form_content .= "Service Interested In: " . $conService . "\n\n";
$form_content .= "Message:\n";
$form_content .= "--------\n";
$form_content .= $conMessage . "\n\n";
$form_content .= "---\n";
$form_content .= "This message was sent from the AlphaGreen Professionals LP website contact form.\n";
$form_content .= "Reply directly to this email to respond to the customer.";

// Build the email headers
$headers = "From: AlphaGreen Contact Form <noreply@alphagreenlp.com>\r\n";
$headers .= "Reply-To: " . $conName . " " . $conLName . " <" . $conEmail . ">\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send the email
if (mail($recipient, $subject, $form_content, $headers)) {
  echo "Y";
} else {
  echo "N";
}
