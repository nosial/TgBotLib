<?php

    require 'ncc';
    import('net.nosial.tgbotlib');

    $bot = new TgBotLib\Bot('5126030313:AAEn3QcwSvTJ2eAKUnSb_MkC5U0tlqkM1xw');
    $bot->sendMessage(chat_id: 570787098, text: 'Hello world!');