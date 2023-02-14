<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaDocument implements ObjectTypeInterface
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
        private $thumb;

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
        private $disable_content_type_detection;

        /**
         * Type of the result, must be document
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
         * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
         * server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and
         * height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't
         * be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the
         * thumbnail was uploaded using multipart/form-data under <file_attach_name>.
         *
         * @see https://core.telegram.org/bots/api#sending-files
         * @return string|null
         */
        public function getThumb(): ?string
        {
            return $this->thumb;
        }

        /**
         * Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Optional. Mode for parsing entities in the document caption.
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
         * @return MessageEntity[]|null
         */
        public function getCaptionEntities(): ?array
        {
            return $this->caption_entities;
        }

        /**
         * Optional. Disables automatic server-side content type detection for files uploaded using multipart/form-data.
         * Always True, if the document is sent as part of an album.
         *
         * @return bool
         */
        public function isDisableContentTypeDetection(): bool
        {
            return $this->disable_content_type_detection;
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
                'thumb' => $this->thumb,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => $caption_entities,
                'disable_content_type_detection' => $this->disable_content_type_detection,
            ];
        }

        /**
         * Constructs object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $caption_entities = null;
            if (isset($data['caption_entities']))
            {
                $caption_entities = [];
                foreach ($data['caption_entities'] as $caption_entity)
                {
                    $caption_entities[] = MessageEntity::fromArray($caption_entity);
                }
            }

            $object = new InputMediaDocument();
            $object->type = $data['type'];
            $object->media = $data['media'];
            $object->thumb = $data['thumb'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = $caption_entities;
            $object->disable_content_type_detection = $data['disable_content_type_detection'];

            return $object;
        }

        /**
         * Constructs object from an InputMedia object.
         *
         * @param InputMedia $inputMedia
         * @return InputMediaDocument
         */
        public static function fromInputMedia(InputMedia $inputMedia): InputMediaDocument
        {
            $object = new InputMediaDocument();
            $object->type = $inputMedia->getType();
            $object->media = $inputMedia->getMedia();
            $object->thumb = $inputMedia->getThumb();
            $object->caption = $inputMedia->getCaption();
            $object->parse_mode = $inputMedia->getParseMode();
            $object->caption_entities = $inputMedia->getCaptionEntities();
            $object->disable_content_type_detection = $inputMedia->isDisableContentTypeDetection();

            return $object;
        }
    }