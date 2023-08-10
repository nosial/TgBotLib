<?php

    require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

    $bot = new TgBotLib\Bot('<BOT TOKEN>');

    $bot->setCommandHandler('start', new \commands\StartCommand());
    $bot->setCommandHandler('hash', new \commands\HashCommand());

    $bot->handleGetUpdates(true);