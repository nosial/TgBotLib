<?php

    namespace TgBotLib\Events;


    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\ChatMemberUpdated;

    abstract class MyChatMemberUpdatedEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::MY_CHAT_MEMBER_UPDATED;
        }

        /**
         * The bot's chat member status was updated in a chat. For private chats,
         * this update is received only when the bot is blocked or unblocked by the user.
         *
         * @return ChatMemberUpdated The updated chat member information.
         */
        protected function getMyChatMemberUpdated(): ChatMemberUpdated
        {
            return $this->update->getMyChatMember();
        }
    }