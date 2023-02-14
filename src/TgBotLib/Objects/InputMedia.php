<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InputMedia implements ObjectTypeInterface
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
         * @var string|null
         */
        private $performer;

        /**
         * @var string|null
         */
        private $title;

        /**
         * @var bool
         */
        private $supports_streaming;

        /**
         * @var bool
         */
        private $has_spoiler;

        /**
         * @var bool
         */
        private $disable_content_type_detection;

        /**
         * Type of the result, can be photo, video, animation, audio or document
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an
         * HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new
         * one using multipart/form-data under <file_attach_name> name.
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
         * height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails
         * can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>”
         * if the thumbnail was uploaded using multipart/form-data under <file_attach_name>.
         *
         * @see https://core.telegram.org/bots/api#sending-files
         * @return string|null
         */
        public function getThumb(): ?string
        {
            return $this->thumb;
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
         * Optional. Mode for parsing entities in the video caption.
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
         * Optional. Video width
         *
         * @return int|null
         */
        public function getWidth(): ?int
        {
            return $this->width;
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
         * Optional. Video duration in seconds
         *
         * @return int|null
         */
        public function getDuration(): ?int
        {
            return $this->duration;
        }

        /**
         * Optional. Performer of the audio
         *
         * @return string|null
         */
        public function getPerformer(): ?string
        {
            return $this->performer;
        }

        /**
         * Optional. Title of the audio
         *
         * @return string|null
         */
        public function getTitle(): ?string
        {
            return $this->title;
        }

        /**
         * Optional. Pass True if the uploaded video is suitable for streaming
         *
         * @return bool
         */
        public function isSupportsStreaming(): bool
        {
            return $this->supports_streaming;
        }

        /**
         * Optional. Pass True if the video needs to be covered with a spoiler animation
         *
         * @return bool
         */
        public function isHasSpoiler(): bool
        {
            return $this->has_spoiler;
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
            if($this->caption_entities !== null)
            {
                $caption_entities = [];
                foreach($this->caption_entities as $entity)
                {
                    $caption_entities[] = $entity->toArray();
                }
            }

            return [
                'type' => $this->type,
                'media' => $this->media,
                'thumb' => $this->thumb,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => $caption_entities,
                'width' => $this->width,
                'height' => $this->height,
                'duration' => $this->duration,
                'performer' => $this->performer,
                'title' => $this->title,
                'supports_streaming' => $this->supports_streaming,
                'has_spoiler' => $this->has_spoiler,
                'disable_content_type_detection' => $this->disable_content_type_detection,
            ];
        }

        /**
         * Constructs a new object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $caption_entities = null;
            if($data['caption_entities'] !== null)
            {
                $caption_entities = [];
                foreach($data['caption_entities'] as $entity)
                {
                    $caption_entities[] = MessageEntity::fromArray($entity);
                }
            }

            $object = new self();
            $object->type = $data['type'];
            $object->media = $data['media'];
            $object->thumb = @$data['thumb'] ?? null;
            $object->caption = @$data['caption'] ?? null;
            $object->parse_mode = @$data['parse_mode'] ?? null;
            $object->caption_entities = $caption_entities;
            $object->width = @$data['width'] ?? null;
            $object->height = @$data['height'] ?? null;
            $object->duration = @$data['duration'] ?? null;
            $object->performer = @$data['performer'] ?? null;
            $object->title = @$data['title'] ?? null;
            $object->supports_streaming = @$data['supports_streaming'] ?? false;
            $object->has_spoiler = @$data['has_spoiler'] ?? false;
            $object->disable_content_type_detection = @$data['disable_content_type_detection'] ?? false;

            return $object;
        }
    }