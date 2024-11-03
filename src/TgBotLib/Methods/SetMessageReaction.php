<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\ReactionType;

    class SetMessageReaction extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): bool
        {
            if (isset($parameters['reaction']) && is_array($parameters['reaction']))
            {
                $parameters['reaction'] = json_encode(array_map(function (ReactionType|string $reaction) {return is_string($reaction) ? $reaction : $reaction->value;}, $parameters['reaction']));
            }

            return self::executeCurl(self::buildPost($bot, Methods::SET_MESSAGE_REACTION->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'message_id'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'reaction',
                'is_big'
            ];
        }
    }