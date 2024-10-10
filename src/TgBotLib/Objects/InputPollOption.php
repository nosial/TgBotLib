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
         * InputPollOption constructor.
         */
        public function __construct()
        {
            $this->text = (string)null;
            $this->text_parse_mode = null;
            $this->text_entities = null;
        }

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
         * @param string $text
         * @return InputPollOption
         */
        public function setText(string $text): InputPollOption
        {
            $this->text = $text;
            return $this;
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
         * @param ParseMode|null $text_parse_mode
         * @return InputPollOption
         */
        public function setTextParseMode(?ParseMode $text_parse_mode): InputPollOption
        {
            $this->text_parse_mode = $text_parse_mode;
            return $this;
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
         * @param MessageEntity[]|null $text_entities
         * @return InputPollOption
         */
        public function setTextEntities(?array $text_entities): InputPollOption
        {
            $this->text_entities = $text_entities;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            $array = [
                'text' => $this->text
            ];

            if($this->text_parse_mode !== null)
            {
                $array['text_parse_mode'] = $this->text_parse_mode->value;
            }

            if($this->text_entities !== null)
            {
                $array['text_entities'] = array_map(fn($item) => $item->toArray(), $this->text_entities);
            }

            return $array;
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