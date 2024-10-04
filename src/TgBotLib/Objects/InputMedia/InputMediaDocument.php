<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InputMedia;

    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\MessageEntity;

    class InputMediaDocument extends InputMedia implements ObjectTypeInterface
    {
        private string $media;
        private ?string $thumb;
        private ?string $caption;
        private ?ParseMode $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private bool $disable_content_type_detection;

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
         * @return ParseMode|null
         */
        public function getParseMode(): ?ParseMode
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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
                'media' => $this->media,
                'thumb' => $this->thumb,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode->value,
                'caption_entities' => array_map(fn(MessageEntity $item) => $item->toArray(), $this->caption_entities),
                'disable_content_type_detection' => $this->disable_content_type_detection,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InputMediaDocument
        {
            if($data === null)
            {
                return null;
            }

            $object = new InputMediaDocument();
            $object->type = $data['type'] ?? null;
            $object->media = $data['media'] ?? null;
            $object->thumb = $data['thumb'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = isset($data['parse_mode']) ? ParseMode::tryFrom($data['parse_mode']) ?? null : null;
            $object->caption_entities = array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities'] ?? []);
            $object->disable_content_type_detection = $data['disable_content_type_detection'] ?? false;

            return $object;
        }
    }