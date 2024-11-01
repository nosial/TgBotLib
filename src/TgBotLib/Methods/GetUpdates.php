<?php

namespace TgBotLib\Methods;

use TgBotLib\Abstracts\Method;
use TgBotLib\Bot;
use TgBotLib\Enums\Methods;
use TgBotLib\Objects\Update;

class GetUpdates extends Method
{

    /**
     * @inheritDoc
     */
    public static function execute(Bot $bot, array $parameters = []): array
    {
        return array_map(
            fn($update) => Update::fromArray($update),
            self::executeCurl(self::buildPost($bot, Methods::GET_UPDATES->value, $parameters))['result']
        );
    }

    /**
     * @inheritDoc
     */
    public static function getRequiredParameters(): ?array
    {
        // TODO: Implement getRequiredParameters() method.
    }

    /**
     * @inheritDoc
     */
    public static function getOptionalParameters(): ?array
    {
        // TODO: Implement getOptionalParameters() method.
    }
}