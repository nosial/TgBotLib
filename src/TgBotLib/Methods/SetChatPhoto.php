<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\Message;

    class SetChatPhoto extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {

            // Handle different photo input types
            if (isset($parameters['photo']))
            {
                $photo = $parameters['photo'];

                // If photo is a file path and exists locally
                if (is_string($photo) && file_exists($photo) && is_file($photo))
                {
                    $curl = self::buildUpload($bot, Methods::SET_CHAT_PHOTO->value, 'photo', $photo, array_diff_key($parameters, ['photo' => null]));
                    return (bool)(self::executeCurl($curl));
                }
            }

            // If photo is a file_id or URL, use regular POST method
            return (bool)(self::executeCurl(self::buildPost($bot, Methods::SET_CHAT_PHOTO->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'photo'
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