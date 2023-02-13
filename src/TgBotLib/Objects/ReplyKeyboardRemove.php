<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ReplyKeyboardRemove implements ObjectTypeInterface
    {
        /**
         * @var bool
         */
        private $remove_keyboard;

        /**
         * @var bool
         */
        private $selective;

        /**
         * Requests clients to remove the custom keyboard (user will not be able to summon this keyboard; if you want
         * to hide the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
         *
         * @return bool
         */
        public function isRemoveKeyboard(): bool
        {
            return $this->remove_keyboard;
        }

        /**
         * Optional. Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users
         * that are @mentioned in the text of the Message object; 2) if the bot's message is a reply
         * (has reply_to_message_id), sender of the original message.
         *
         * Example: A user votes in a poll, bot returns confirmation message in reply to the vote and removes the
         * keyboard for that user, while still showing the keyboard with poll options to users who haven't voted yet.
         *
         * @return bool
         */
        public function isSelective(): bool
        {
            return $this->selective;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'remove_keyboard' => $this->remove_keyboard,
                'selective' => $this->selective,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();
            $object->remove_keyboard = @$data['remove_keyboard'] ?? false;
            $object->selective = @$data['selective'] ?? false;
            return $object;
        }
    }