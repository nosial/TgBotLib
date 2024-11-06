<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;

    class PromoteChatMember extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            return (bool)self::executeCurl(self::buildPost($bot, Methods::PROMOTE_CHAT_MEMBER->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'user_id'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'is_anonymous',
                'can_manage_chat',
                'can_delete_messages',
                'can_manage_video_chats',
                'can_restrict_members',
                'can_promote_members',
                'can_change_info',
                'can_invite_users',
                'can_post_stories',
                'can_edit_stories',
                'can_delete_stories',
                'can_post_messages',
                'can_edit_messages',
                'can_pin_messages',
                'can_manage_topics'
            ];
        }
    }