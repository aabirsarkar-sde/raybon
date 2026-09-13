<?php
/**
 * Copy this file to include/config.php and fill in the real values.
 *
 * include/config.php holds live credentials and must NEVER be committed,
 * zipped into a public archive, or left readable over HTTP. The .htaccess
 * in the site root blocks direct access to the whole include/ directory.
 */

return array(
    // Mailbox that receives contact form enquiries.
    'contact_recipient' => 'sales@raybonchemicals.com',

    // SMTP account used to send the enquiry mail.
    'smtp_host'     => 'smtp.gmail.com',
    'smtp_port'     => 465,
    'smtp_secure'   => 'ssl',
    'smtp_username' => 'chemicals@raybonchemicals.com',

    // Google App Password. Generate at https://myaccount.google.com/apppasswords
    'smtp_password' => 'PUT-THE-APP-PASSWORD-HERE',
);
