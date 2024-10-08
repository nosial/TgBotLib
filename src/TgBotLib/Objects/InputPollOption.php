<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InputPollOption implements ObjectTypeInterface
    {
        private string $text;
        private ?ParseMode $text_parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $text_entities;

        /**
         * Option text, 1-100 characters
         *
         * @return string
         */
        public function getText(): string
        {
            return $this->text;
        }

        /**
         * Optional. Mode for parsing entities in the text. See formatting options for more details.
         * Currently, only custom emoji entities are allowed
         *
         * @return ParseMode|null
         */
        public function getTextParseMode(): ?ParseMode
        {
            return $this->text_parse_mode;
        }

        /**
         * Optional. A JSON-serialized list of special entities that appear in the poll option text.
         * It can be specified instead of text_parse_mode
         *
         * @return MessageEntity[]|null
         */
        public function getTextEntities(): ?array
        {
            return $this->text_entities;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'text' => $this->text,
                'text_parse_mode' => $this->text_parse_mode?->value,
                'text_entities' => array_map(fn(MessageEntity $item) => $item->toArray(), $this->text_entities)
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InputPollOption
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->text_entities = $data['text'];
            $object->text_parse_mode = ParseMode::tryFrom($data['text_parse_mode']);
            $object->text_entities = array_map(fn($item) => MessageEntity::fromArray($item), $data['text_entities']);

            return $object;
        }
    }