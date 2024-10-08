<?php

namespace TgBotLib\Methods;

use InvalidArgumentException;
use TgBotLib\Abstracts\Method;
use TgBotLib\Bot;
use TgBotLib\Enums\Methods;
use TgBotLib\Exceptions\TelegramException;
use TgBotLib\Objects\Message;

class ForwardMessage extends Method
{
    /**
     * Use this method to forward messages of any kind. Service messages and messages with protected content can't be
     * forwarded. On success, the sent Message is returned.
     *
     * @param Bot $bot
     * @param array $parameters
     * @return Message
     * @throws TelegramException
     */
    public static function execute(Bot $bot, array $parameters = []): Message
    {
        return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::FORWARD_MESSAGE->value, $parameters)));
    }

    /**
     * @inheritDoc
     */
    public static function getRequiredParameters(): array
    {
        return [
            'chat_id',
            'from_chat_id',
            'message_id'
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getOptionalParameters(): array
    {
        return [
            'message_thread_id',
            'disable_notification',
            'protect_content'
        ];
    }
}