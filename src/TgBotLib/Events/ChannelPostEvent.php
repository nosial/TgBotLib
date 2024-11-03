<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Message;

    abstract class ChannelPostEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::CHANNEL_POST;
        }

        /**
         * Retrieves the current channel post.
         *
         * @return Message The channel post message.
         */
        protected function getChannelPost(): Message
        {
            return $this->update->getChannelPost();
        }
    }