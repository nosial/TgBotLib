<?php

    require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
    import('net.nosial.tamerlib');
    
    $bot = new TgBotLib\Bot('<BOT TOKEN>');
    \TamerLib\tm::initialize(\TamerLib\Enums\TamerMode::CLIENT);
    \TamerLib\tm::createWorker(8, __DIR__ . DIRECTORY_SEPARATOR . 'worker.php');

    // Handle updates forever
    while(true)
    {
        foreach ($bot->getUpdates() as $update)
        {
            \TamerLib\tm::dof('handle_update', [$update]);
        }
        
        \TamerLib\tm::wait(3);
    }