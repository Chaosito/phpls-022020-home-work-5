<?php
include_once('vendor/autoload.php');

/* Mail-Server (for send messages) */
const MAIL_SERVER       = 'smtp.yandex.ru';
const MAIL_PORT         = 465;
const MAIL_USER         = '***USER***';
const MAIL_PASS         = '***PASSWORD***';
const MAIL_ENCRYPTION   = 'SSL';
const MAIL_FROM_NAME    = 'User';
    
try {
    $transport = (new Swift_SmtpTransport(MAIL_SERVER, MAIL_PORT))
        ->setUsername(MAIL_USER)
        ->setPassword(MAIL_PASS)
        ->setEncryption(MAIL_ENCRYPTION);

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message("MailSubject"))
        ->setFrom([MAIL_USER => MAIL_FROM_NAME])
        ->setTo([MAIL_USER])
        ->setBody('mail text');

    $result = $mailer->send($message);
    
    if ($result) {
        print "Mail sended!";
    }
} catch (Exception $e) {
    die('Error: '.$e->getMessage());
}