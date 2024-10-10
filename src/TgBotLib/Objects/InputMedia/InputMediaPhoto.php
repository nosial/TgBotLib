<?php


    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaPhoto extends InputMedia implements ObjectTypeInterface
    {
        private string $media;
        private ?string $caption;
        private ?ParseMode $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private bool $has_spoiler;

        /**
         * InputMediaPhoto constructor.
         */
        public function __construct()
        {
            $this->media = '';
            $this->caption = null;
            $this->parse_mode = null;
            $this->caption_entities = null;
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
         * @return InputMediaPhoto
         */
        public function setMedia(string $media): InputMediaPhoto
        {
            $this->media = $media;
            return $this;
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
         * Sets the caption of the photo to be sent, 0-1024 characters after entities parsing
         *
         * @param string|null $caption
         * @return InputMediaPhoto
         */
        public function setCaption(?string $caption): InputMediaPhoto
        {
            $this->caption = $caption;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the photo caption.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         * @return ParseMode|null
         */
        public function getParseMode(): ?ParseMode
        {
            return $this->parse_mode;
        }

        /**
         * Sets the mode for parsing entities in the photo caption.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         * @param ParseMode|null $parse_mode
         * @return InputMediaPhoto
         */
        public function setParseMode(?ParseMode $parse_mode): InputMediaPhoto
        {
            $this->parse_mode = $parse_mode;
            return $this;
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
         * Sets the list of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @param array|null $caption_entities
         * @return InputMediaPhoto
         */
        public function setCaptionEntities(?array $caption_entities): InputMediaPhoto
        {
            $this->caption_entities = $caption_entities;
            return $this;
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
         * Sets the photo needs to be covered with a spoiler animation
         *
         * @param bool $has_spoiler
         * @return InputMediaPhoto
         */
        public function setHasSpoiler(bool $has_spoiler): InputMediaPhoto
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
                'media' => $this->media,
            ];

            if($this->caption !== null)
            {
                $array['caption'] = $this->caption;
            }

            if($this->parse_mode !== null)
            {
                $array['parse_mode'] = $this->parse_mode->value;
            }

            if ($this->has_spoiler)
            {
                $array['has_spoiler'] = $this->has_spoiler;
            }

            if ($this->caption_entities !== null)
            {
                $array['caption_entities'] = array_map(fn(MessageEntity $entity) => $entity->toArray(), $this->caption_entities);
            }

            return $array;
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
            $object->parse_mode = isset($data['parse_mode']) ? ParseMode::tryFrom($data['parse_mode']) ?? null : null;
            $object->has_spoiler = $data['has_spoiler'] ?? null;
            $object->caption_entities = array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities'] ?? []);

            return $object;
        }
    }