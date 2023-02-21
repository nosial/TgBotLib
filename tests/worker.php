<?php

    require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
    import('net.nosial.tamerlib');

    $bot = new TgBotLib\Bot('865804194:AAHTo9aIFP5X47dMYLJ6eoldHJnM6sc3LBc');

    $bot->setCommandHandler('start', new \commands\StartCommand());
    $bot->setCommandHandler('hash', new \commands\HashCommand());

    TamerLib\Tamer::initWorker();

    TamerLib\Tamer::addFunction('handle_update', function (\TamerLib\Objects\Job $job) use ($bot)
    {
        $bot->handleUpdate(\TgBotLib\Objects\Telegram\Update::fromArray(json_decode($job->getData(), true)));
    });

    TamerLib\Tamer::work();