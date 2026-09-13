<?php
/**
 * Live configuration. Not to be committed or archived publicly.
 *
 * NOTE: the previous app password was hard-coded in contact-form-handler.php,
 * which was itself included in raybonchemicals.zip in the public web root.
 * Treat it as compromised and rotate it, then update the value below.
 */

return array(
    'contact_recipient' => 'sales@raybonchemicals.com',

    'smtp_host'     => 'smtp.gmail.com',
    'smtp_port'     => 465,
    'smtp_secure'   => 'ssl',
    'smtp_username' => 'chemicals@raybonchemicals.com',
    'smtp_password' => 'iknmdpldtbkiaskm',
);
