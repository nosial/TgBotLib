<?php


    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Enums\Types\InputMediaType;
    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaAnimation extends InputMedia implements ObjectTypeInterface
    {
        private ?string $thumb;
        private ?string $caption;
        private ?ParseMode $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private ?int $width;
        private ?int $height;
        private ?int $duration;
        private bool $has_spoiler;

        /**
         * InputMediaAnimation constructor.
         */
        public function __construct()
        {
            $this->thumb = null;
            $this->caption = null;
            $this->parse_mode = null;
            $this->caption_entities = null;
            $this->width = null;
            $this->height = null;
            $this->duration = null;
            $this->has_spoiler = false;
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
         * Sets the file to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP
         * URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one
         * using multipart/form-data under <file_attach_name> name.
         *
         * @see https://core.telegram.org/bots/api#sending-files
         * @param string $media
         * @return InputMediaAnimation
         */
        public function setMedia(string $media): InputMediaAnimation
        {
            $this->media = $media;
            return $this;
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
         * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
         * server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and
         * height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't
         * be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the
         * thumbnail was uploaded using multipart/form-data under <file_attach_name>.
         *
         * @see https://core.telegram.org/bots/api#sending-files
         * @param string|null $thumb
         * @return InputMediaAnimation
         */
        public function setThumb(?string $thumb): InputMediaAnimation
        {
            $this->thumb = $thumb;
            return $this;
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
         * Optional. Caption of the animation to be sent, 0-1024 characters after entities parsing
         *
         * @see https://core.telegram.org/bots/api#sending-files
         * @param string|null $caption
         * @return InputMediaAnimation
         */
        public function setCaption(?string $caption): InputMediaAnimation
        {
            $this->caption = $caption;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the animation caption.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         * @return ParseMode|null
         */
        public function getParseMode(): ?ParseMode
        {
            return $this->parse_mode;
        }

        /**
         * Optional. Mode for parsing entities in the animation caption.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         * @param ParseMode|null $parse_mode
         * @return InputMediaAnimation
         */
        public function setParseMode(?ParseMode $parse_mode): InputMediaAnimation
        {
            $this->parse_mode = $parse_mode;
            return $this;
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
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @param MessageEntity[]|null $caption_entities
         * @return InputMediaAnimation
         */
        public function setCaptionEntities(?array $caption_entities): InputMediaAnimation
        {
            $this->caption_entities = $caption_entities;
            return $this;
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
         * Optional. Animation width
         *
         * @param int|null $width
         * @return InputMediaAnimation
         */
        public function setWidth(?int $width): InputMediaAnimation
        {
            $this->width = $width;
            return $this;
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
         * Optional. Animation height
         *
         * @param int|null $height
         * @return InputMediaAnimation
         */
        public function setHeight(?int $height): InputMediaAnimation
        {
            $this->height = $height;
            return $this;
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
         * Optional. Animation duration in seconds
         *
         * @param int|null $duration
         * @return InputMediaAnimation
         */
        public function setDuration(?int $duration): InputMediaAnimation
        {
            $this->duration = $duration;
            return $this;
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
         * Optional. Pass True if the animation needs to be covered with a spoiler animation
         *
         * @param bool $has_spoiler
         * @return InputMediaAnimation
         */
        public function setHasSpoiler(bool $has_spoiler): InputMediaAnimation
        {
            $this->has_spoiler = $has_spoiler;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            $array = [
                'type' => $this->type->value,
                'media' => $this->media,
            ];

            if($this->thumb !== null)
            {
                $array['thumb'] = $this->thumb;
            }

            if($this->caption !== null)
            {
                $array['caption'] = $this->caption;
            }

            if($this->parse_mode !== null)
            {
                $array['parse_mode'] = $this->parse_mode->value;
            }

            if($this->caption_entities !== null)
            {
                $array['caption_entities'] = array_map(fn(MessageEntity $entity) => $entity->toArray(), $this->caption_entities);
            }

            if($this->width !== null)
            {
                $array['width'] = $this->width;
            }

            if($this->height !== null)
            {
                $array['height'] = $this->height;
            }

            if($this->duration !== null)
            {
                $array['duration'] = $this->duration;
            }

            if($this->has_spoiler)
            {
                $array['has_spoiler'] = $this->has_spoiler;
            }

            return $array;
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InputMediaAnimation
        {
            if($data === null)
            {
                return null;
            }

            $object = new static();
            $object->type = $data['type'] ?? InputMediaType::ANIMATION;
            $object->media = $data['media'] ?? null;
            $object->thumb = $data['thumb'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = isset($data['parse_mode']) ? ParseMode::tryFrom($data['parse_mode']) ?? null : null;
            $object->caption_entities = array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities'] ?? []);
            $object->width = $data['width'] ?? null;
            $object->height = $data['height'] ?? null;
            $object->duration = $data['duration'] ?? null;
            $object->has_spoiler = $data['has_spoiler'] ?? false;

            return $object;
        }
    }