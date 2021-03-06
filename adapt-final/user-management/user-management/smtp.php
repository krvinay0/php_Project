<?php

    return [


        /*
        |--------------------------------------------------------------------------
        | SMTP Host Address
        |--------------------------------------------------------------------------
        |
        | Here you may provide the host address of the SMTP server used by your
        | applications.
        |
        */

        'host' => 'smtp.mailtrap.io',

        /*
        |--------------------------------------------------------------------------
        | SMTP Host Port
        |--------------------------------------------------------------------------
        |
        | This is the SMTP port used by your application to deliver e-mails to
        | users of the application.
        |
        */

        'port' => 25,

        /*
        |--------------------------------------------------------------------------
        | Global "From" Address
        |--------------------------------------------------------------------------
        |
        | You may wish for all e-mails sent by your application to be sent from
        | the same address. Here, you may specify a name and address that is
        | used globally for all e-mails that are sent by your application.
        |
        */

        'from' => ['address' => 'info@gowebs.in', 'name' => 'Rahul'],

        /*
        |--------------------------------------------------------------------------
        | E-Mail Encryption Protocol
        |--------------------------------------------------------------------------
        |
        | Here you may specify the encryption protocol that should be used when
        | the application send e-mail messages. A sensible default using the
        | transport layer security protocol should provide great security.
        |
        */

        'encryption' => '',

        /*
        |--------------------------------------------------------------------------
        | SMTP Server Username
        |--------------------------------------------------------------------------
        |
        | If your SMTP server requires a username for authentication, you should
        | set it here. This will get used to authenticate with your server on
        | connection. You may also set the "password" value below this one.
        |
        */

        'username' => '',

        /*
        |--------------------------------------------------------------------------
        | SMTP Server Password
        |--------------------------------------------------------------------------
        |
        | Here you may set the password required by your SMTP server to send out
        | messages from your application. This will be given to the server on
        | connection so that the application will be able to send messages.
        |
        */

        'password' => '',


    ];
