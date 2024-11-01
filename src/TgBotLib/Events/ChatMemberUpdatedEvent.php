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
         * Retrieves the updated chat member information from the update object.
         *
         * @return ChatMemberUpdated The updated chat member instance.
         */
        protected function getChatMemberUpdated(): ChatMemberUpdated
        {
            return $this->update->getChatMember();
        }
    }