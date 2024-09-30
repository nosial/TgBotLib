<?php

    require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
    import('net.nosial.tamerlib');

    $bot = new TgBotLib\BotOld('<BOT TOKEN>');

    $bot->setCommandHandler('start', new \commands\StartCommand());
    $bot->setCommandHandler('hash', new \commands\HashCommand());

    \TamerLib\tm::initialize(\TamerLib\Enums\TamerMode::WORKER);
    \TamerLib\tm::addFunction('handle_update', [$bot, 'handleUpdate']);
    \TamerLib\tm::run();