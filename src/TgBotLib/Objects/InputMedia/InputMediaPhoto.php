<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaPhoto extends InputMedia implements ObjectTypeInterface
    {
        private string $media;
        private ?string $caption;
        private ?string $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private bool $has_spoiler;

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
                'caption_entities' => array_map(fn(MessageEntity $item) => $item->toArray(), $this->caption_entities),
                'has_spoiler' => $this->has_spoiler,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InputMediaPhoto
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = $data['type'] ?? null;
            $object->media = $data['media'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->has_spoiler = $data['has_spoiler'] ?? null;
            $object->caption_entities = array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities'] ?? []);

            return $object;
        }
    }