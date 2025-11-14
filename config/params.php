<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'debug' => function ($message) {
        echo '<pre>';
        if (is_array($message)) {
            print_r($message);
        } else {
            echo $message;
        }
        echo '</pre>';
    }
];
