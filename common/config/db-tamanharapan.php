<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=localhost;dbname=landa2_cms',
            'dsn' => 'mysql:host=localhost;dbname=landa_cms_indomobilecell',
            'username' => 'root',
            'password' => 'landak',
            'charset' => 'utf8',
            'tablePrefix'=>'acca_',
        ],
        'db2' => [
            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=localhost;dbname=landa2_cms',
            'dsn' => 'mysql:host=localhost;dbname=landa_acca',
            'username' => 'root',
            'password' => 'landak',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
