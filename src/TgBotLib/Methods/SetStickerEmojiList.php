<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;

    class SetStickerEmojiList extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if(isset($parameters['keywords']) && is_array($parameters['keywords']))
            {
                $parameters['keywords'] = json_encode($parameters['keywords']);
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::SET_STICKER_EMOJI_LIST->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'sticker',
                'emoji_list'
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