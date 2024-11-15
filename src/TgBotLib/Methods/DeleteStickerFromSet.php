<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;

    class DeleteStickerFromSet extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            return (bool)self::executeCurl(self::buildPost($bot, Methods::DELETE_STICKER_FROM_SET->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
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