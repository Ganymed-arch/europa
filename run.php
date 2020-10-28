<?php
include __DIR__.'/vendor/autoload.php';

$discord = new \Discord\Discord([
    'token' => '',
]);

$discord->on('ready', function ($discord) {
    echo "Bot is ready.", PHP_EOL;

  //false steht für tts
  //$discord->guilds['653497369471483904']->channels['736201862541344819']->sendMessage('Test', false);

  //$var = $discord->guilds['653497369471483904']->channels['736201862541344819']->name;
  //$var = $discord->guilds['653497369471483904']->channels;

  $discord->guilds['653497369471483904']->channels['736201862541344819']->sendMessage(__DIR__.'/currency_ticker/bitcoin.php', false);
  include __DIR__.'/currency_ticker/bitcoin.php';
  $btc = new Bitcoin\bitcoin();
  foreach ($btc->getBitcoin() as $bValue) {
    $discord->guilds['653497369471483904']->channels['736201862541344819']->sendMessage(strval($bValue), false);
  }
  /*foreach ($var as $channel){
    $discord->guilds['653497369471483904']->channels[$channel->id]->sendMessage($btc->getBitcoin(), false);
  }
    // Listen for events here
    $discord->on('message', function ($message) {
        echo "Recieved a message from {$message->author->username}: {$message->content}", PHP_EOL;
        if ($message->author->username !== 'Europa') {
          echo "Hello ";
          echo $message->reply($message->author);
        }
    });*/
});

$discord->run();
