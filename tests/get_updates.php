<?php

    use commands\StartCommand;

    require 'ncc';
    import('net.nosial.tgbotlib');

    require 'commands/StartCommand.php';

    $bot = new TgBotLib\Bot('YOUR_BOT_TOKEN');
    $bot->setCommandHandler('start', new StartCommand());

    $bot->handleGetUpdates(true);