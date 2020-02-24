<?php

require_once '../sportupfolder/vendor/autoload.php';

define('MAILGUN_KEY', 'fa09de5d18e1b2dd556a57e5f9ea8247-41a2adb4-16380c95');

define('MAILGUN_PUBKEY', 'pubkey-7c6d2e0b9672d3265a3cf399bb7d5571');



define('MAILGUN_DOMAIN', 'subscribe.sportup.rs');

define('MAILGUN_LIST', 'info@subscribe.sportup.rs');

define('MAILGUN_SECRET', 'aleksasarapetar');



$mailgun= new Mailgun\Mailgun(MAILGUN_KEY);

$mailgunValidate = new Mailgun\Mailgun(MAILGUN_PUBKEY);

$mailgunOptIn = $mailgun->OptInHandler();

 ?>

