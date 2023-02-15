<?php

    require 'ncc';
    import('net.nosial.tgbotlib');

    $bot = new TgBotLib\Bot('5126030313:AAEn3QcwSvTJ2eAKUnSb_MkC5U0tlqkM1xw');

    while(true)
    {
        foreach($bot->getUpdates() as $update)
        {
            if($update->getMessage() !== null && $update->getMessage()->getText() !== null)
            {
                print(sprintf("%s: %s", $update->getMessage()->getFrom()->getFirstName(), $update->getMessage()->getText()) . PHP_EOL);
                $bot->sendMessage($update->getMessage()->getChat()->getId(), sprintf("Hello %s!", $update->getMessage()->getFrom()->getFirstName()));
                $bot->sendPhoto($update->getMessage()->getChat()->getId(), 'https://git.n64.cc/uploads/-/system/appearance/header_logo/1/9d9bd13afce1a798d22ecfd9897730ed.gif');
            }
        }
    }