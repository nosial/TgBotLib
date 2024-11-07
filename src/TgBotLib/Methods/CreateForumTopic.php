<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\ForumTopic;

    class CreateForumTopic extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): ForumTopic
        {
            return ForumTopic::fromArray(self::executeCurl(self::buildPost($bot, Methods::CREATE_FORUM_TOPIC->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'name'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'icon_color',
                'icon_custom_emoji_id'
            ];
        }
    }