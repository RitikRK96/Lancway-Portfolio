<?php
// Replace with your email address
$receiving_email_address = 'lancway.developer@gmail.com';

// Check if the PHP Email Form library exists
$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';

if (file_exists($php_email_form)) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create an instance of PHP_Email_Form
$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Uncomment this section if you want to use SMTP
/*
$contact->smtp = array(
    'host' => 'smtp.your-email-provider.com', // e.g., smtp.gmail.com
    'username' => 'your-email@example.com',
    'password' => 'your-password',
    'port' => '587' // 465 for SSL or 587 for TLS
);
*/

// Add messages
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Send the email
echo $contact->send();
?>
