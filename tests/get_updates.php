<?php

    require 'ncc';
    import('net.nosial.tgbotlib');

    require 'commands/StartCommand.php';

    $bot = new TgBotLib\Bot('865804194:AAHTo9aIFP5X47dMYLJ6eoldHJnM6sc3LBc');
    $bot->setCommandHandler('start', new \commands\StartCommand());

    print_r(json_encode($bot->getMe()->toArray()) . PHP_EOL);
    $bot->sendMessage(570787098, 'Hello, world!');
    $bot->handleGetUpdates();
    unset($bot);