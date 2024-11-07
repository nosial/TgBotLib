<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\ChatMember;
    use TgBotLib\Objects\Stickers\Sticker;

    class GetForumTopicIconStickers extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): array
        {
            return array_map(
                fn($update) => Sticker::fromArray($update),
                self::executeCurl(self::buildPost($bot, Methods::GET_FORUM_TOPIC_ICON_STICKERS->value, $parameters))
            );
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return null;
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return null;
        }
    }