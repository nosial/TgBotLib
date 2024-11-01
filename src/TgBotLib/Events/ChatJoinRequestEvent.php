<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\ChatJoinRequest;

    abstract class ChatJoinRequestEvent extends UpdateEvent
    {
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::CHAT_JOIN_REQUEST_EVENT;
        }

        /**
         * Retrieves the chat join request from the update.
         *
         * @return ChatJoinRequest The chat join request data.
         */
        protected function getChatJoinRequest(): ChatJoinRequest
        {
            return $this->update->getChatJoinRequest();
        }
    }