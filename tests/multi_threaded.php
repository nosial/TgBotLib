<?php

    require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
    import('net.nosial.tamerlib');

    $bot = new TgBotLib\Bot(getenv('BOT_TOKEN'));
    TamerLib\Tamer::init(\TamerLib\Abstracts\ProtocolType::Gearman, ['127.0.0.1:4730']);
    TamerLib\Tamer::addWorker(__DIR__ . DIRECTORY_SEPARATOR . 'worker.php', 10);

    var_dump('Starting workers');
    TamerLib\Tamer::startWorkers();

    while(true)
    {
        foreach($bot->getUpdates() as $update)
        {
            TamerLib\Tamer::do(TamerLib\Objects\Task::create('handle_update', json_encode($update->toArray())));
        }
    }