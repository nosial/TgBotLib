<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

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
         * Optional. List of special entities that appear in message text, which can be specified instead of parse_mode
         *
         * @return MessageEntity[]|null
         */
        public function getEntities(): ?array
        {
            return $this->entities;
        }

        /**
         * Optional. Disables link previews for links in the sent message
         *
         * @return bool
         */
        public function isDisableWebPagePreview(): bool
        {
            return $this->disable_web_page_preview;
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