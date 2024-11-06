<?php

    namespace TgBotLib\Events;

    use OptsLib\Parse;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Message;

    abstract class CommandEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::COMMAND;
        }

        /**
         * Retrieve the command to be executed.
         *
         * In the format of a string, this method should return the command to be executed.
         * for example if the command is "/start", this method should return "start".
         *
         * @return string The command to be executed.
         */
        public abstract static function getCommand(): string;

        /**
         * Retrieves the message from the update.
         *
         * @return Message The message contained within the update.
         */
        protected function getMessage(): Message
        {
            return $this->update->getAnyMessage();
        }

        /**
         * Extracts and returns the arguments of the command from the message text.
         *
         * @return string The arguments of the command.
         */
        protected function getArguments(): string
        {
            if(strlen($this->getMessage()->getCommand()) <= strlen(static::getCommand()) + 1)
            {
                return '';
            }

            return substr($this->getMessage()->getCommand(), strlen(static::getCommand()) + 1);
        }

        /**
         * Parses and returns the command arguments as an array.
         *
         * @return array The parsed command arguments.
         */
        protected function getParsedArguments(): array
        {
            return Parse::parseArgument($this->getArguments());
        }
    }