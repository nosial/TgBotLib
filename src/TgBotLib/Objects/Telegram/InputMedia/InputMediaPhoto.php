<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InputMedia;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InputMedia;
    use TgBotLib\Objects\Telegram\MessageEntity;

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
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => is_array($this->caption_entities) ? array_map(function ($item) {
                    if($item instanceof ObjectTypeInterface)
                    {
                        return $item->toArray();
                    }
                    return $item;
                }, $this->caption_entities) : null,
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

            $object->type = $data['type'] ?? null;
            $object->media = $data['media'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->has_spoiler = $data['has_spoiler'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(function ($item)
            {
                return MessageEntity::fromArray($item);
            }, $data['caption_entities']) : null;

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
            $object->has_spoiler = $inputMedia->hasSpoiler();
            $object->caption_entities = $inputMedia->getCaptionEntities();

            return $object;
        }
    }