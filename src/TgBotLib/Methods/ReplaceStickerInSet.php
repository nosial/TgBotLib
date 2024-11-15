<?php

namespace TgBotLib\Methods;

use TgBotLib\Abstracts\Method;
use TgBotLib\Bot;
use TgBotLib\Exceptions\NotImplementedException;

class ReplaceStickerInSet extends Method
{

    /**
     * @inheritDoc
     */
    public static function execute(Bot $bot, array $parameters = []): true
    {
        throw new NotImplementedException("The method is not yet implemented, check back later");
    }

    /**
     * @inheritDoc
     */
    public static function getRequiredParameters(): ?array
    {
        return [
            'user_id',
            'name',
            'old_sticker',
            'sticker'
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getOptionalParameters(): ?array
    {
        return null;
    }
}