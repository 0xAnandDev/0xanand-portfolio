<?php

// Replace this with your own email address
$to = 'anand.doddi.dev@gmail.com';

function get_site_url() {
    $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
    return $scheme . '://' . $host;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Step 1: Add Variable Initialization & Capture all inputs
    $name = isset($_POST['name']) ? trim(stripslashes($_POST['name'])) : '';
    $email = isset($_POST['email']) ? trim(stripslashes($_POST['email'])) : '';
    $subject = isset($_POST['subject']) ? trim(stripslashes($_POST['subject'])) : '';
    $contact_message = isset($_POST['message']) ? trim(stripslashes($_POST['message'])) : '';

    if (empty($subject)) {
        $subject = "Contact Form Submission";
    }

    // Step 2: Add Form Validation
    if (empty($name)) {
        echo "Please enter your name.";
        exit;
    }
    if (empty($email)) {
        echo "Please enter your email address.";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
        exit;
    }
    if (empty($contact_message)) {
        echo "Please enter your message.";
        exit;
    }

    // Step 3: Sanitize Inputs (to prevent XSS or injection when displaying)
    $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $safe_subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    $safe_message = nl2br(htmlspecialchars($contact_message, ENT_QUOTES, 'UTF-8'));

    // Step 4: Fix the Message Building (Initialize properly instead of appending to undefined var)
    $message = "Email from: " . $safe_name . "<br />";
    $message .= "Email address: " . $safe_email . "<br />";
    $message .= "Message: <br />";
    $message .= $safe_message;
    $message .= "<br /> ----- <br /> This email was sent from your site " . get_site_url() . " contact form. <br />";

    // Step 5: Fix the From and Headers (DMARC compliant From header)
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
    $from_email = 'no-reply@' . preg_replace('/^www\./', '', $host);
    if (!filter_var($from_email, FILTER_VALIDATE_EMAIL)) {
        $from_email = $to;
    }

    $from = $safe_name . " <" . $from_email . ">";

    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Step 6 & 7: Add Error Handling & sending
    ini_set("sendmail_from", $to); // for Windows server
    
    // Silence errors to handle them programmatically
    $mail = @mail($to, $subject, $message, $headers);

    if ($mail) {
        echo "OK";
    } else {
        echo "Something went wrong. The server was unable to send your mail. Please try again later.";
    }
} else {
    echo "Method not allowed.";
}
?>