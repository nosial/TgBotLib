<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

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
         * @return array[][]
         */
        public function toArray(): array
        {
            $data = [];

            if ($this->inline_keyboard !== null)
            {
                /** @var InlineKeyboardButton $item */
                foreach ($this->inline_keyboard as $item)
                {
                    $data[][] = $item->toArray();
                }
            }

            return $data;
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

            $object->inline_keyboard = [];

            foreach($data as $item)
            {
                $object->inline_keyboard[] = InlineKeyboardButton::fromArray($item);
            }

            return $object;
        }

    }