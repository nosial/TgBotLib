<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\UserProfilePhotos;

    class GetUserProfilePhotos extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): UserProfilePhotos
        {
            return UserProfilePhotos::fromArray(self::executeCurl(self::buildPost($bot, Methods::GET_USER_PROFILE_PHOTOS->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'user_id'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'offset',
                'limit'
            ];
        }
    }