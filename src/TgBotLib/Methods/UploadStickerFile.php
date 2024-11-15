<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\File;
    use TgBotLib\Objects\Message;

    class UploadStickerFile extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): File
        {
            if (isset($parameters['sticker']))
            {
                $sticker = $parameters['sticker'];

                // If media is a file path and exists locally
                if (is_string($sticker) && file_exists($sticker) && is_file($sticker))
                {
                    $curl = self::buildUpload($bot, Methods::UPLOAD_STICKER_FILE->value, 'sticker', $sticker, array_diff_key($parameters, ['sticker' => null]));
                    return File::fromArray(self::executeCurl($curl));
                }
            }

            return File::fromArray(self::executeCurl(self::buildPost($bot, Methods::UPLOAD_STICKER_FILE->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'user_id',
                'sticker',
                'sticker_format'
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