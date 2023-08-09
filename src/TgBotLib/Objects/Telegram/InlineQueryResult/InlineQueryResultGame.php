<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineKeyboardMarkup;

    class InlineQueryResultGame implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * @var string
         */
        private $id;

        /**
         * @var string
         */
        private $game_short_name;

        /**
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * Type of the result must be game
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * Unique identifier for this result, 1-64 bytes
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Sets the value of the 'id' field
         * Unique identifier for this result, 1-64 bytes
         *
         * @param string $id
         * @return InlineQueryResultGame
         */
        public function setId(string $id): InlineQueryResultGame
        {
            $this->id = $id;
            return $this;
        }

        /**
         * Short name of the game
         *
         * @return string
         */
        public function getGameShortName(): string
        {
            return $this->game_short_name;
        }

        /**
         * Sets the value of the 'game_short_name' field
         * Short name of the game
         *
         * @param string $game_short_name
         * @return InlineQueryResultGame
         */
        public function setGameShortName(string $game_short_name): InlineQueryResultGame
        {
            $this->game_short_name = $game_short_name;
            return $this;
        }

        /**
         * Optional. Inline keyboard attached to the message
         *
         * @return InlineKeyboardMarkup|null
         */
        public function getReplyMarkup(): ?InlineKeyboardMarkup
        {
            return $this->reply_markup;
        }

        /**
         * Optional. Inline keyboard attached to the message
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return InlineQueryResultGame
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultGame
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
                'id' => $this->id,
                'game_short_name' => $this->game_short_name,
                'reply_markup' => ($this->reply_markup instanceof InlineKeyboardMarkup) ? $this->reply_markup->toArray() : null
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

            $object->type = $data['type'] ?? null;
            $object->id = $data['id'] ?? null;
            $object->game_short_name = $data['game_short_name'] ?? null;
            $object->reply_markup = $data['reply_markup'] ?? null;

            return $object;
        }
    }