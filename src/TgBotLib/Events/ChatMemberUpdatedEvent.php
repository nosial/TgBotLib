<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\ChatMemberUpdated;

    abstract class ChatMemberUpdatedEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::CHAT_MEMBER_UPDATED;
        }

        /**
         * A chat member's status was updated in a chat. The bot must be an administrator in the chat and must
         * explicitly specify "chat_member" in the list of allowed_updates to receive these updates.
         *
         * @return ChatMemberUpdated The updated chat member instance.
         */
        protected function getChatMemberUpdated(): ChatMemberUpdated
        {
            return $this->update->getChatMember();
        }
    }