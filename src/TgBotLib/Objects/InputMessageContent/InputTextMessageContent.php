<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InputMessageContent;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\MessageEntity;

    class InputTextMessageContent implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $message_text;

        /**
         * @var string|null
         */
        private $parse_mode;

        /**
         * @var MessageEntity[]|null
         */
        private $entities;

        /**
         * @var bool
         */
        private $disable_web_page_preview;

        /**
         * Text of the message to be sent, 1-4096 characters
         *
         * @return string
         */
        public function getMessageText(): string
        {
            return $this->message_text;
        }

        /**
         * Sets the value of 'message_text' property
         * Text of the message to be sent, 1-4096 characters
         *
         * @param string $message_text
         * @return $this
         */
        public function setMessageText(string $message_text): self
        {
            if(!Validate::length($message_text, 1, 4096))
                throw new InvalidArgumentException('message_text should be between 1-4096 characters');

            $this->message_text = $message_text;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the message text.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         * @return string|null
         */
        public function getParseMode(): ?string
        {
            return $this->parse_mode;
        }

        /**
         * Sets the value of 'parse_mode' property
         * Optional. Mode for parsing entities in the message text.
         *
         * @param string|null $parse_mode
         * @return $this
         */
        public function setParseMode(?string $parse_mode): self
        {
            if($parse_mode == null)
            {
                $this->parse_mode = null;
                return $this;
            }

            if(!in_array(strtolower($parse_mode), ['markdown', 'html']))
                throw new InvalidArgumentException('parse_mode should be either Markdown or HTML');

            $this->parse_mode = strtolower($parse_mode);
            return $this;
        }

        /**
         * Optional. List of special entities that appear in message text, which can be specified instead of parse_mode
         *
         * @return MessageEntity[]|null
         */
        public function getEntities(): ?array
        {
            return $this->entities;
        }

        /**
         * Sets the value of 'entities' property
         * Optional. List of special entities that appear in message text, which can be specified instead of parse_mode
         *
         * @param MessageEntity[]|null $entities
         * @return $this
         */
        public function setEntities(?array $entities): self
        {
            if($entities == null)
            {
                $this->entities = null;
                return $this;
            }

            foreach($entities as $entity)
            {
                if(!($entity instanceof MessageEntity))
                    throw new InvalidArgumentException('entities should be an array of MessageEntity objects');
            }

            $this->entities = $entities;
            return $this;
        }

        /**
         * Optional. Disables link previews for links in the sent message
         *
         * @return bool
         * @noinspection PhpUnused
         */
        public function isDisableWebPagePreview(): bool
        {
            return $this->disable_web_page_preview;
        }

        /**
         * Sets the value of 'disable_web_page_preview' property
         * Optional. Disables link previews for links in the sent message
         *
         * @param bool $disable_web_page_preview
         * @return $this
         */
        public function setDisableWebPagePreview(bool $disable_web_page_preview): self
        {
            $this->disable_web_page_preview = $disable_web_page_preview;
            return $this;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            $message_entities = null;

            if($this->entities !== null)
            {
                /** @var MessageEntity $entity */
                foreach($this->entities as $entity)
                {
                    if($entity instanceof MessageEntity)
                    {
                        $message_entities[] = $entity->toArray();
                    }
                }

            }


            return [
                'message_text' => $this->message_text,
                'parse_mode' => $this->parse_mode,
                'entities' => $message_entities,
                'disable_web_page_preview' => $this->disable_web_page_preview,
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

            $object->message_text = $data['message_text'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->disable_web_page_preview = (bool)$data['disable_web_page_preview'] ?? false;

            if(isset($data['entities']))
            {
                foreach($data['entities'] as $entity)
                {
                    $object->entities[] = MessageEntity::fromArray($entity);
                }
            }

            return $object;
        }
    }