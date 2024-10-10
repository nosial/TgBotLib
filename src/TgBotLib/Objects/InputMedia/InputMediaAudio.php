<?php


    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaAudio extends InputMedia implements ObjectTypeInterface
    {
        private string $media;
        private ?string $thumb;
        private ?string $caption;
        private ?ParseMode $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private ?int $duration;
        private ?string $performer;
        private ?string $title;

        /**
         * InputMediaAudio constructor.
         */
        public function __construct()
        {
            $this->media = (string)null;
            $this->thumb = null;
            $this->caption = null;
            $this->parse_mode = null;
            $this->caption_entities = null;
            $this->duration = null;
            $this->performer = null;
            $this->title = null;
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
         * @return InputMediaAudio
         */
        public function setMedia(string $media): InputMediaAudio
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
         * @return InputMediaAudio
         */
        public function setThumb(?string $thumb): InputMediaAudio
        {
            $this->thumb = $thumb;
            return $this;
        }

        /**
         * Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
         *
         * @param string|null $caption
         * @return InputMediaAudio
         */
        public function setCaption(?string $caption): InputMediaAudio
        {
            $this->caption = $caption;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the audio caption.
         *
         * @return ParseMode|null
         */
        public function getParseMode(): ?ParseMode
        {
            return $this->parse_mode;
        }

        /**
         * Optional. Mode for parsing entities in the audio caption.
         *
         * @param ParseMode|null $parse_mode
         * @return InputMediaAudio
         */
        public function setParseMode(?ParseMode $parse_mode): InputMediaAudio
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
         * @return InputMediaAudio
         */
        public function setCaptionEntities(?array $caption_entities): InputMediaAudio
        {
            $this->caption_entities = $caption_entities;
            return $this;
        }

        /**
         * Optional. Duration of the audio in seconds
         *
         * @return int|null
         */
        public function getDuration(): ?int
        {
            return $this->duration;
        }

        /**
         * Optional. Duration of the audio in seconds
         *
         * @param int|null $duration
         * @return InputMediaAudio
         */
        public function setDuration(?int $duration): InputMediaAudio
        {
            $this->duration = $duration;
            return $this;
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
         * Optional. Performer of the audio
         *
         * @param string|null $performer
         * @return InputMediaAudio
         */
        public function setPerformer(?string $performer): InputMediaAudio
        {
            $this->performer = $performer;
            return $this;
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
         * Optional. Title of the audio
         *
         * @param string|null $title
         * @return InputMediaAudio
         */
        public function setTitle(?string $title): InputMediaAudio
        {
            $this->title = $title;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            $array = [
                'type' => $this->type?->value,
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

            if($this->duration !== null)
            {
                $array['duration'] = $this->duration;
            }

            if($this->performer !== null)
            {
                $array['performer'] = $this->performer;
            }

            if($this->title !== null)
            {
                $array['title'] = $this->title;
            }

            return $array;
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InputMediaAudio
        {
            if($data === null)
            {
                return null;
            }

            $object = new InputMediaAudio();
            $object->type = $data['type'] ?? null;
            $object->media = $data['media'] ?? null;
            $object->thumb = $data['thumb'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = isset($data['parse_mode']) ? ParseMode::tryFrom($data['parse_mode']) ?? null : null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities'] ?? []) : null;
            $object->duration = $data['duration'] ?? null;
            $object->performer = $data['performer'] ?? null;
            $object->title = $data['title'] ?? null;

            return $object;
        }
    }