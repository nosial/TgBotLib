<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\MessageReactionCountUpdated;

    abstract class MessageReactionCountEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::MESSAGE_REACTION_COUNT;
        }

        /**
         * Reactions to a message with anonymous reactions were changed. The bot must be an administrator in the chat
         * and must explicitly specify "message_reaction_count" in the list of allowed_updates to receive these updates.
         * The updates are grouped and can be sent with delay up to a few minutes.
         *
         * @return MessageReactionCountUpdated
         */
        protected function getMessageReactionCount(): MessageReactionCountUpdated
        {
            return $this->update->getMessageReactionCount();
        }
    }