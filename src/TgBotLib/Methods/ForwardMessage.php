<?php

namespace TgBotLib\Methods;

use InvalidArgumentException;
use TgBotLib\Abstracts\Method;
use TgBotLib\Bot;
use TgBotLib\Enums\Methods;
use TgBotLib\Objects\Message;

class ForwardMessage extends Method
{
    /**
     * @inheritDoc
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