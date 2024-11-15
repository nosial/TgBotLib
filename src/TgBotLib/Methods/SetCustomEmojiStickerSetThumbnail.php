<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;

    class SetCustomEmojiStickerSetThumbnail extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            return (bool)self::executeCurl(self::buildPost($bot, Methods::SET_CUSTOM_EMOJI_STICKER_SET_THUMBNAIL->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'name'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'custom_emoji_id'
            ];
        }
    }