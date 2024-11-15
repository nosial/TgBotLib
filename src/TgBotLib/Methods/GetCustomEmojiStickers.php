<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\Stickers\Sticker;

    class GetCustomEmojiStickers extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): array
        {
            if(isset($parameters['custom_emoji_ids']) && is_array($parameters['custom_emoji_ids']))
            {
                $parameters['custom_emoji_ids'] = json_encode($parameters['custom_emoji_ids']);
            }

            return array_map(function($emoji) {
                return Sticker::fromArray($emoji);
            }, self::executeCurl(self::buildPost($bot, Methods::GET_CUSTOM_EMOJI_STICKERS->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'custom_emoji_ids'
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