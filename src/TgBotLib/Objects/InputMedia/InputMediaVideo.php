<?php


    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaVideo extends InputMedia implements ObjectTypeInterface
    {
        private string $media;
        private ?string $thumb;
        private ?string $caption;
        private ?ParseMode $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private ?int $width;
        private ?int $height;
        private ?string $duration;
        private bool $supports_streaming;
        private bool $has_spoiler;

        /**
         * InputMediaVideo constructor.
         */
        public function __construct()
        {
            $this->media = (string)null;
            $this->thumb = null;
            $this->caption = null;
            $this->parse_mode = null;
            $this->caption_entities = null;
            $this->width = null;
            $this->height = null;
            $this->duration = null;
            $this->supports_streaming = false;
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
         * Sets the file to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
         * pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload
         * a new one using multipart/form-data under <file_attach_name> name.
         *
         * @param string|null $thumb
         * @return $this
         */
        public function setThumb(?string $thumb): InputMediaVideo
        {
            $this->thumb = $thumb;
            return $this;
        }

        /**
         * Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Sets the caption of the video to be sent, 0-1024 characters after entities parsing
         *
         * @param string|null $caption
         * @return $this
         */
        public function setCaption(?string $caption): InputMediaVideo
        {
            $this->caption = $caption;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the video caption.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         * @return ParseMode|null
         */
        public function getParseMode(): ?ParseMode
        {
            return $this->parse_mode;
        }

        /**
         * Sets the mode for parsing entities in the video caption.
         *
         * @param ParseMode|null $parse_mode
         * @return $this
         */
        public function setParseMode(?ParseMode $parse_mode): InputMediaVideo
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
         * Sets the list of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @param MessageEntity[]|null $caption_entities
         * @return $this
         */
        public function setCaptionEntities(?array $caption_entities): InputMediaVideo
        {
            $this->caption_entities = $caption_entities;
            return $this;
        }

        /**
         * Optional. Video width
         *
         * @return int|null
         */
        public function getWidth(): ?int
        {
            return $this->width;
        }

        /**
         * Optional. Video width
         *
         * @param int|null $width
         * @return $this
         */
        public function setWidth(?int $width): InputMediaVideo
        {
            $this->width = $width;
            return $this;
        }

        /**
         * Optional. Video height
         *
         * @return int|null
         */
        public function getHeight(): ?int
        {
            return $this->height;
        }

        /**
         * Optional. Video height
         *
         * @param int|null $height
         * @return $this
         */
        public function setHeight(?int $height): InputMediaVideo
        {
            $this->height = $height;
            return $this;
        }

        /**
         * Optional. Video duration in seconds
         *
         * @return int|null
         */
        public function getDuration(): ?int
        {
            return $this->duration;
        }

        /**
         * Optional. Video duration in seconds
         *
         * @param int|null $duration
         * @return $this
         */
        public function setDuration(?int $duration): InputMediaVideo
        {
            $this->duration = $duration;
            return $this;
        }

        /**
         * Optional. Pass True if the uploaded video is suitable for streaming
         *
         * @return bool
         */
        public function supportsStreaming(): bool
        {
            return $this->supports_streaming;
        }

        /**
         * Optional. Pass True if the uploaded video is suitable for streaming
         *
         * @param bool $supports_streaming
         * @return $this
         */
        public function setSupportsStreaming(bool $supports_streaming): InputMediaVideo
        {
            $this->supports_streaming = $supports_streaming;
            return $this;
        }

        /**
         * Optional. Pass True if the video needs to be covered with a spoiler animation
         *
         * @return bool
         */
        public function hasSpoiler(): bool
        {
            return $this->has_spoiler;
        }

        /**
         * Optional. Pass True if the video needs to be covered with a spoiler animation
         *
         * @param bool $has_spoiler
         * @return $this
         */
        public function setHasSpoiler(bool $has_spoiler): InputMediaVideo
        {
            $this->has_spoiler = $has_spoiler;
            return $this;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            $array = [
                'type' => $this->type->value,
                'media' => $this->media
            ];

            if ($this->thumb !== null)
            {
                $array['thumb'] = $this->thumb;
            }

            if ($this->caption !== null)
            {
                $array['caption'] = $this->caption;
            }

            if ($this->parse_mode !== null)
            {
                $array['parse_mode'] = $this->parse_mode->value;
            }

            if ($this->caption_entities !== null)
            {
                $array['caption_entities'] = array_map(fn(MessageEntity $item) => $item->toArray(), $this->caption_entities);
            }

            if ($this->width !== null)
            {
                $array['width'] = $this->width;
            }

            if ($this->height !== null)
            {
                $array['height'] = $this->height;
            }

            if ($this->duration !== null)
            {
                $array['duration'] = $this->duration;
            }

            if ($this->supports_streaming)
            {
                $array['supports_streaming'] = $this->supports_streaming;
            }

            if ($this->has_spoiler)
            {
                $array['has_spoiler'] = $this->has_spoiler;
            }

            return $array;
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InputMediaVideo
        {
            if($data === null)
            {
                return null;
            }

            $object = new InputMediaVideo();
            $object->type = $data['type'] ?? null;
            $object->media = $data['media'] ?? null;
            $object->thumb = $data['thumb'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities'] ?? []) : null;
            $object->width = $data['width'] ?? null;
            $object->height = $data['height'] ?? null;
            $object->duration = $data['duration'] ?? null;
            $object->supports_streaming = $data['supports_streaming'] ?? false;
            $object->has_spoiler = $data['has_spoiler'] ?? false;

            return $object;
        }
    }