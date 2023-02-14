<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaPhoto implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * @var string
         */
        private $media;

        /**
         * @var string|null
         */
        private $caption;

        /**
         * @var string|null
         */
        private $parse_mode;

        /**
         * @var MessageEntity[]|null
         */
        private $caption_entities;

        /**
         * @var bool
         */
        private $has_spoiler;

        /**
         * Type of the result, must be photo
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP
         * URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one
         * using multipart/form-data under <file_attach_name> name.
         *
         * @see https://core.telegram.org/bots/api#sending-files
         * @return string
         */
        public function getMedia(): string
        {
            return $this->media;
        }

        /**
         * Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Optional. Mode for parsing entities in the photo caption.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         * @return string|null
         */
        public function getParseMode(): ?string
        {
            return $this->parse_mode;
        }

        /**
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @return array|null
         */
        public function getCaptionEntities(): ?array
        {
            return $this->caption_entities;
        }

        /**
         * Optional. Pass True if the photo needs to be covered with a spoiler animation
         *
         * @return bool
         */
        public function isHasSpoiler(): bool
        {
            return $this->has_spoiler;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            $caption_entities = null;
            if ($this->caption_entities)
            {
                $caption_entities = [];
                foreach ($this->caption_entities as $caption_entity)
                {
                    $caption_entities[] = $caption_entity->toArray();
                }
            }

            return [
                'type' => $this->type,
                'media' => $this->media,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => $caption_entities,
                'has_spoiler' => $this->has_spoiler,
            ];
        }

        /**
         * Constructs the object from an array
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->type = $data['type'];
            $object->media = $data['media'];
            $object->caption = $data['caption'];
            $object->parse_mode = $data['parse_mode'];
            $object->has_spoiler = $data['has_spoiler'];

            if (isset($data['caption_entities']))
            {
                $object->caption_entities = [];
                foreach ($data['caption_entities'] as $caption_entity)
                {
                    $object->caption_entities[] = MessageEntity::fromArray($caption_entity);
                }
            }

            return $object;
        }

        /**
         * Constructs object from InputMedia
         *
         * @param InputMedia $inputMedia
         * @return InputMediaPhoto
         */
        public static function fromInputMedia(InputMedia $inputMedia): InputMediaPhoto
        {
            $object = new self();

            $object->type = $inputMedia->getType();
            $object->media = $inputMedia->getMedia();
            $object->caption = $inputMedia->getCaption();
            $object->parse_mode = $inputMedia->getParseMode();
            $object->has_spoiler = $inputMedia->isHasSpoiler();

            if ($inputMedia->getCaptionEntities())
            {
                $object->caption_entities = [];
                foreach ($inputMedia->getCaptionEntities() as $caption_entity)
                {
                    $object->caption_entities[] = MessageEntity::fromArray($caption_entity);
                }
            }

            return $object;
        }
    }