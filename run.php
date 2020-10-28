<?php

include __DIR__.'/vendor/autoload.php';

$discord = new \Discord\Discord([
    'token' => 'NzcwOTQyNTEwOTk0MTYxNjc2.X5k6Kg.ahVSnhVZyfzDcmZQX1K0cp_ZNrQ',
]);

$discord->on('ready', function ($discord) {
    echo "Bot is ready.", PHP_EOL;
  
    // Listen for events here
    $discord->on('message', function ($message) {
        echo "Recieved a message from {$message->author->username}: {$message->content}", PHP_EOL;
    });
});

$discord->run();
