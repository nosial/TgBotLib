<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaAudio implements ObjectTypeInterface
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
         * Type of the result, must be audio
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
         * Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Optional. Mode for parsing entities in the audio caption.
         *
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
         * Optional. Duration of the audio in seconds
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
         * Returns an array representation of the object
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
                'duration' => $this->duration,
                'performer' => $this->performer,
                'title' => $this->title
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return InputMediaAudio
         * @noinspection DuplicatedCode
         */
        public static function fromArray(array $data): self
        {

            $object = new InputMediaAudio();
            $object->type = $data['type'] ?? null;
            $object->media = $data['media'] ?? null;
            $object->thumb = $data['thumb'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(function ($item)
            {
                return MessageEntity::fromArray($item);
            }, $data['caption_entities']) : null;
            $object->duration = $data['duration'] ?? null;
            $object->performer = $data['performer'] ?? null;
            $object->title = $data['title'] ?? null;

            return $object;
        }

        /**
         * Constructs object from an InputMedia object
         *
         * @param InputMedia $inputMedia
         * @return InputMediaAudio
         */
        public static function fromInputMedia(InputMedia $inputMedia): InputMediaAudio
        {
            $object = new InputMediaAudio();
            $object->type = $inputMedia->getType();
            $object->media = $inputMedia->getMedia();
            $object->thumb = $inputMedia->getThumb();
            $object->caption = $inputMedia->getCaption();
            $object->parse_mode = $inputMedia->getParseMode();
            $object->caption_entities = $inputMedia->getCaptionEntities();
            $object->duration = $inputMedia->getDuration();
            $object->performer = $inputMedia->getPerformer();
            $object->title = $inputMedia->getTitle();
            
            return $object;
        }
    }