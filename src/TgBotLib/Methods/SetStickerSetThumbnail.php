<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\Message;

    class SetStickerSetThumbnail extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            // Handle different thumbnail input types
            if (isset($parameters['thumbnail']))
            {
                $thumbnail = $parameters['thumbnail'];

                // If thumbnail is a file path and exists locally
                if (is_string($thumbnail) && file_exists($thumbnail) && is_file($thumbnail))
                {
                    return (bool)self::executeCurl(self::buildUpload($bot, Methods::SET_STICKER_SET_THUMBNAIL->value, 'thumbnail', $thumbnail, array_diff_key($parameters, ['thumbnail' => null])));
                }
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::SET_STICKER_SET_THUMBNAIL->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'name',
                'user_id',
                'format'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'thumbnail'
            ];
        }
    }