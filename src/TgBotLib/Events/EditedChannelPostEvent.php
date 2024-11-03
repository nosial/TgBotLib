<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Message;

    abstract class EditedChannelPostEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::EDITED_CHANNEL_POST;
        }

        /**
         * Retrieves the edited channel post from the update.
         *
         * @return Message The edited channel post.
         */
        protected function getEditedChannelPost(): Message
        {
            return $this->update->getEditedChannelPost();
        }
    }