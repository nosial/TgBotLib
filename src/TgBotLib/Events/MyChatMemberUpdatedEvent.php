<?php

    namespace TgBotLib\Events;


    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\ChatMemberUpdated;

    abstract class MyChatMemberUpdatedEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::MY_CHAT_MEMBER_UPDATED;
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