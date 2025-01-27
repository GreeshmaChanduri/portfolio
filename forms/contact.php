<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Replace this with your actual email address
    $to = 'chandurigreeshmaa@example.com';

    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate form fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        die('Error: All fields are required.');
    }

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email content
    $email_body = "You have received a new message from your website contact form:\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Error: Unable to send the email. Please try again later.";
    }
} else {
    // Handle invalid request method
    http_response_code(405); // Method Not Allowed
    echo "Error: Invalid request method.";
}
?>
