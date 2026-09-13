<?php
/**
 * Contact form handler.
 *
 * Validates the enquiry form on contact.php, mails it to the sales mailbox
 * via SMTP, then redirects to the thank-you page. Credentials live in
 * include/config.php, which is blocked from HTTP access by .htaccess.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/include/PHPMAILER/Exception.php';
require_once __DIR__ . '/include/PHPMAILER/PHPMailer.php';
require_once __DIR__ . '/include/PHPMAILER/SMTP.php';

$config = require __DIR__ . '/include/config.php';

// Never render PHP errors to visitors — they leak file paths and settings.
ini_set('display_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

/** Collapse newlines so user input can't be injected into mail headers. */
function rb_single_line($value)
{
    return trim(preg_replace('/[\r\n]+/', ' ', (string) $value));
}

$errors = array();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// Honeypot: a field hidden from humans. Anything that fills it is a bot,
// and is shown the same thank-you page so it does not learn it was caught.
if (!empty($_POST['website'])) {
    header('Location: contact-form-thank-you.php');
    exit;
}

$name    = rb_single_line(isset($_POST['name']) ? $_POST['name'] : '');
$email   = rb_single_line(isset($_POST['email']) ? $_POST['email'] : '');
$phone   = rb_single_line(isset($_POST['phone']) ? $_POST['phone'] : '');
$message = trim(isset($_POST['message']) ? $_POST['message'] : '');

if ($name === '' || $email === '' || $phone === '' || $message === '') {
    $errors[] = 'All fields are required.';
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

if (strlen($name) > 120 || strlen($phone) > 40 || strlen($message) > 5000) {
    $errors[] = 'One of the fields is longer than we can accept.';
}

if (empty($errors)) {
    $mail = new PHPMailer(true);

    try {
        $mail->CharSet    = 'UTF-8';
        $mail->isSMTP();
        $mail->Host       = $config['smtp_host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $config['smtp_username'];
        $mail->Password   = $config['smtp_password'];
        $mail->SMTPSecure = $config['smtp_secure'];
        $mail->Port       = $config['smtp_port'];

        // From must stay on our own domain or the mail will fail SPF/DKIM.
        // The enquirer's address goes in Reply-To so staff can just hit reply.
        $mail->setFrom($config['smtp_username'], 'Raybon Chemicals Website');
        $mail->addAddress($config['contact_recipient']);
        $mail->addReplyTo($email, $name);

        $mail->Subject = 'Website enquiry from ' . $name;

        // Escaped: the body is HTML and the values come from the public form.
        $mail->isHTML(true);
        $mail->Body =
            '<p>A new enquiry has come in from the website.</p>' .
            '<table cellpadding="6" style="border-collapse:collapse">' .
            '<tr><td><strong>Name</strong></td><td>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</td></tr>' .
            '<tr><td><strong>Email</strong></td><td>' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</td></tr>' .
            '<tr><td><strong>Phone</strong></td><td>' . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . '</td></tr>' .
            '<tr><td valign="top"><strong>Message</strong></td><td>' . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . '</td></tr>' .
            '</table>';
        $mail->AltBody =
            "A new enquiry has come in from the website.\n\n" .
            "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\n\nMessage:\n{$message}";

        $mail->send();

        header('Location: contact-form-thank-you.php');
        exit;
    } catch (Exception $e) {
        // Log the detail, show the visitor something harmless.
        error_log('Contact form mail failure: ' . $mail->ErrorInfo);
        $errors[] = 'Sorry, the message could not be sent just now. Please call us on +91 265 298 57 33.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<title>Contact form &mdash; Raybon Chemicals</title>
<style>
    body { font-family: Arial, Helvetica, sans-serif; margin: 60px auto; max-width: 620px; padding: 0 20px; color: #0e1b2e; }
    h1 { font-size: 22px; }
    ul { padding-left: 20px; }
    li { margin-bottom: 8px; }
    a { color: #2b5699; }
</style>
</head>
<body>
    <h1>We could not send your message</h1>
    <ul>
        <?php foreach ($errors as $error): ?>
        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="contact.php">Go back to the contact form</a></p>
</body>
</html>
