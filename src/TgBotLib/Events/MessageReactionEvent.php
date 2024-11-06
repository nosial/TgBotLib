<?php

    namespace TgBotLib\Events;

    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\MessageReactionUpdated;

    abstract class MessageReactionEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::MESSAGE_REACTION;
        }

        /**
         * A reaction to a message was changed by a user. The bot must be an administrator in the chat and must
         * explicitly specify "message_reaction" in the list of allowed_updates to receive these updates.
         * The update isn't received for reactions set by bots.
         *
         * @return MessageReactionUpdated
         */
        protected function getMessageReactionUpdated(): MessageReactionUpdated
        {
            return $this->update->getMessageReaction();
        }
    }