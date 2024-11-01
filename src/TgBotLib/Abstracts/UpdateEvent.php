<?php

    namespace TgBotLib\Abstracts;

    use TgBotLib\Bot;
    use TgBotLib\Enums\UpdateEventType;
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
         * @return UpdateEventType The event type of the current instance.
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::UPDATE_EVENT;
        }

        public abstract function handle(Bot $bot): void;
    }