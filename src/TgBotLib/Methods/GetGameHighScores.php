<?php

namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\GameHighScore;

    class GetGameHighScores extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): array
        {
            return array_map(fn(array $items) => GameHighScore::fromArray($items), self::executeCurl(self::buildPost($bot, Methods::GET_GAME_HIGH_SCORES->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'user_id'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'chat_id',
                'message_id',
                'inline_message_id'
            ];
        }
    }