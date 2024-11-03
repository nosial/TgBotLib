<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\ChatJoinRequest;

    abstract class ChatJoinRequestEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::CHAT_JOIN_REQUEST_EVENT;
        }

        /**
         * A request to join the chat has been sent. The bot must have the can_invite_users
         * administrator right in the chat to receive these updates.
         *
         * @return ChatJoinRequest The chat join request data.
         */
        protected function getChatJoinRequest(): ChatJoinRequest
        {
            return $this->update->getChatJoinRequest();
        }
    }