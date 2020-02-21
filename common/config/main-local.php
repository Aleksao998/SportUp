<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=sportup_data',
            'username' => 'sportup',
            'password' => 'j2867TT!g]CatX',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
             'transport' => [
         'class' => 'Swift_SmtpTransport',
         'host' => 'mail.sportup.rs',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
         'username' => 'info@sportup.rs',
         'password' => 'sAp#2018info',
         'port' => '465', // Port 25 is a very common port too
         'encryption' => 'ssl', // It is often used, check your provider or mail server specs
     			    ],
        	],
    ],
];
