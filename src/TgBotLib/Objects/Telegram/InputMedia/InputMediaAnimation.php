<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InputMedia;

    use TgBotLib\Enums\InputMediaType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InputMedia;
    use TgBotLib\Objects\Telegram\MessageEntity;

    class InputMediaAnimation implements ObjectTypeInterface
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
         * @var int|null
         */
        private $width;

        /**
         * @var int|null
         */
        private $height;

        /**
         * @var int|null
         */
        private $duration;

        /**
         * @var bool
         */
        private $has_spoiler;

        /**
         * Type of the result, must be animation
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
         * Optional. Caption of the animation to be sent, 0-1024 characters after entities parsing
         *
         * @see https://core.telegram.org/bots/api#sending-files
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Optional. Mode for parsing entities in the animation caption.
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
         * Optional. Animation width
         *
         * @return int|null
         */
        public function getWidth(): ?int
        {
            return $this->width;
        }

        /**
         * Optional. Animation height
         *
         * @return int|null
         */
        public function getHeight(): ?int
        {
            return $this->height;
        }

        /**
         * Optional. Animation duration in seconds
         *
         * @return int|null
         */
        public function getDuration(): ?int
        {
            return $this->duration;
        }

        /**
         * Optional. Pass True if the animation needs to be covered with a spoiler animation
         *
         * @return bool
         */
        public function hasSpoiler(): bool
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
            return [
                'type' => $this->type,
                'media' => $this->media,
                'thumb' => $this->thumb,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => is_array($this->caption_entities) ? array_map(function ($item) {
                    if($item instanceof ObjectTypeInterface)
                    {
                        return $item->toArray();
                    }
                    return $item;
                }, $this->caption_entities) : null,
                'width' => $this->width,
                'height' => $this->height,
                'duration' => $this->duration,
                'has_spoiler' => $this->has_spoiler,
            ];
        }

        /**
         * Constructs object from an array representation.
         *
         * @param array $data
         * @return InputMediaAnimation
         * @noinspection DuplicatedCode
         */
        public static function fromArray(array $data): self
        {
            $object = new static();
            $object->type = $data['type'] ?? InputMediaType::ANIMATION;
            $object->media = $data['media'] ?? null;
            $object->thumb = $data['thumb'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(function ($item)
            {
                return MessageEntity::fromArray($item);
            }, $data['caption_entities']) : null;
            $object->width = $data['width'] ?? null;
            $object->height = $data['height'] ?? null;
            $object->duration = $data['duration'] ?? null;
            $object->has_spoiler = $data['has_spoiler'] ?? false;

            return $object;
        }

        /**
         * Constructs object from InputMedia
         *
         * @param InputMedia $inputMedia
         * @return InputMediaAnimation
         * @noinspection DuplicatedCode
         */
        public static function fromInputMedia(InputMedia $inputMedia): InputMediaAnimation
        {
            $object = new static();

            $object->type = $inputMedia->getType();
            $object->media = $inputMedia->getMedia();
            $object->thumb = $inputMedia->getThumb();
            $object->caption = $inputMedia->getCaption();
            $object->parse_mode = $inputMedia->getParseMode();
            $object->caption_entities = $inputMedia->getCaptionEntities();
            $object->width = $inputMedia->getWidth();
            $object->height = $inputMedia->getHeight();
            $object->duration = $inputMedia->getDuration();
            $object->has_spoiler = $inputMedia->hasSpoiler();

            return $object;
        }
    }