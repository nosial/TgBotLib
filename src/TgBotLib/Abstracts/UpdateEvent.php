<?php

    namespace TgBotLib\Abstracts;

    use TgBotLib\Bot;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\Update;

    abstract class UpdateEvent
    {
        protected Update $update;

        /**
         * Constructor for the class.
         *
         * @param Update $update The update instance to be used.
         * @return void
         */
        public function __construct(Update $update)
        {
            $this->update = $update;
        }

        /**
         * Retrieves the event type.
         * @return EventType The event type of the current instance.
         */
        public static function getEventType(): EventType
        {
            return EventType::UPDATE_EVENT;
        }

        /**
         * Abstract method to handle the bot instance.
         *
         * @param Bot $bot The bot instance to be handled.
         * @return void
         * @throws TelegramException
         */
        public abstract function handle(Bot $bot): void;
    }