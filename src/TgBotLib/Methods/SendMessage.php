<?php

namespace TgBotLib\Methods;

use InvalidArgumentException;
use TgBotLib\Abstracts\Method;
use TgBotLib\Bot;
use TgBotLib\Enums\Methods;
use TgBotLib\Objects\Telegram\Message;

class SendMessage extends Method
{
    /**
     * @inheritDoc
     */
    public static function execute(Bot $bot, array $parameters = []): Message
    {
        if(!isset($parameters['chat_id']))
        {
            throw new InvalidArgumentException('chat_id is required');
        }

        if(!isset($parameters['text']))
        {
            throw new InvalidArgumentException('text is required');
        }

        return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_MESSAGE->value, $parameters)));
    }
}