<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InlineKeyboardMarkup implements ObjectTypeInterface
    {
        /**
         * @var InlineKeyboardButton[][]
         */
        private $inline_keyboard;

        /**
         * Array of button rows, each represented by an Array of InlineKeyboardButton objects
         *
         * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
         * @return InlineKeyboardButton[][]
         */
        public function getInlineKeyboard(): array
        {
            return $this->inline_keyboard;
        }

        /**
         * Returns an array representation of the object
         *
         * @return InlineKeyboardButton[][][]
         */
        public function toArray(): array
        {
            return [
                'inline_keyboard' => $this->inline_keyboard,
            ];
        }

        /**
         * Constructs the object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();
            $object->inline_keyboard = @$data['inline_keyboard'] ?? null;
            return $object;
        }

    }