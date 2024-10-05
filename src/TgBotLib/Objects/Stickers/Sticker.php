<?php


    namespace TgBotLib\Objects\Stickers;

    use TgBotLib\Enums\Types\StickerType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\File;
    use TgBotLib\Objects\PhotoSize;

    class Sticker implements ObjectTypeInterface
    {
        private string $file_id;
        private string $file_unique_id;
        private StickerType $type;
        private int $width;
        private int $height;
        private bool $is_animated;
        private bool $is_video;
        private ?PhotoSize $thumbnail;
        private ?string $emoji;
        private ?string $set_name;
        private ?File $premium_animation;
        private ?MaskPosition $mask_position;
        private ?string $custom_emoji_id;
        private bool $needs_repainting;
        private ?int $file_size;

        /**
         * Identifier for this file, which can be used to download or reuse the file
         *
         * @return string
         */
        public function getFileId(): string
        {
            return $this->file_id;
        }

        /**
         * Unique identifier for this file, which is supposed to be the same over time and for different bots.
         * Can't be used to download or reuse the file.
         *
         * @return string
         */
        public function getFileUniqueId(): string
        {
            return $this->file_unique_id;
        }

        /**
         * Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is
         * independent of its format, which is determined by the fields is_animated and is_video.
         *
         * @return StickerType
         */
        public function getType(): StickerType
        {
            return $this->type;
        }

        /**
         * Sticker width
         *
         * @return int
         */
        public function getWidth(): int
        {
            return $this->width;
        }

        /**
         * Sticker height
         *
         * @return int
         */
        public function getHeight(): int
        {
            return $this->height;
        }

        /**
         * True, if the sticker is animated
         *
         * @see https://telegram.org/blog/animated-stickers
         * @return bool
         */
        public function isIsAnimated(): bool
        {
            return $this->is_animated;
        }

        /**
         * True, if the sticker is a video sticker
         *
         * @see https://telegram.org/blog/video-stickers-better-reactions
         * @return bool
         */
        public function isIsVideo(): bool
        {
            return $this->is_video;
        }

        /**
         * Optional. Sticker thumbnail in the .WEBP or .JPG format
         *
         * @return PhotoSize|null
         */
        public function getThumbnail(): ?PhotoSize
        {
            return $this->thumbnail;
        }

        /**
         * Optional. Emoji associated with the sticker
         *
         * @return string|null
         */
        public function getEmoji(): ?string
        {
            return $this->emoji;
        }

        /**
         * Optional. Name of the sticker set to which the sticker belongs
         *
         * @return string|null
         */
        public function getSetName(): ?string
        {
            return $this->set_name;
        }

        /**
         * Optional. For premium regular stickers, premium animation for the sticker
         *
         * @return File|null
         */
        public function getPremiumAnimation(): ?File
        {
            return $this->premium_animation;
        }

        /**
         * Optional. For mask stickers, the position where the mask should be placed
         *
         * @return MaskPosition|null
         */
        public function getMaskPosition(): ?MaskPosition
        {
            return $this->mask_position;
        }

        /**
         * Optional. For custom emoji stickers, unique identifier of the custom emoji
         *
         * @return string|null
         */
        public function getCustomEmojiId(): ?string
        {
            return $this->custom_emoji_id;
        }

        /**
         * Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram
         * Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
         *
         * @return bool
         */
        public function needsRepainting(): bool
        {
            return $this->needs_repainting;
        }

        /**
         * Optional. File size in bytes
         *
         * @return int|null
         */
        public function getFileSize(): ?int
        {
            return $this->file_size;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'file_id' => $this->file_id,
                'file_unique_id' => $this->file_unique_id,
                'type' => $this->type->value,
                'width' => $this->width,
                'height' => $this->height,
                'is_animated' => $this->is_animated,
                'is_video' => $this->is_video,
                'thumbnail' => ($this->thumbnail instanceof ObjectTypeInterface) ? $this->thumbnail->toArray() : $this->thumbnail,
                'emoji' => $this->emoji,
                'set_name' => $this->set_name,
                'premium_animation' => ($this->premium_animation instanceof ObjectTypeInterface) ? $this->premium_animation->toArray() : $this->premium_animation,
                'mask_position' => ($this->mask_position instanceof ObjectTypeInterface) ? $this->mask_position->toArray() : $this->mask_position,
                'custom_emoji_id' => $this->custom_emoji_id,
                'needs_repainting' => $this->needs_repainting,
                'file_size' => $this->file_size,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Sticker
        {
            if($data === null)
            {
                return null;
            }

            $object = new static();
            $object->file_id = $data['file_id'];
            $object->file_unique_id = $data['file_unique_id'];
            $object->type = StickerType::tryFrom($data['type']);
            $object->width = $data['width'];
            $object->height = $data['height'];
            $object->is_animated = $data['is_animated'];
            $object->is_video = $data['is_video'];
            $object->thumbnail = isset($data['thumbnail']) ? PhotoSize::fromArray($data['thumbnail']) : null;
            $object->emoji = $data['emoji'] ?? null;
            $object->set_name = $data['set_name'] ?? null;
            $object->premium_animation = isset($data['premium_animation']) ? File::fromArray($data['premium_animation']) : null;
            $object->mask_position = isset($data['mask_position']) ? MaskPosition::fromArray($data['mask_position']) : null;
            $object->custom_emoji_id = $data['custom_emoji_id'] ?? null;
            $object->needs_repainting = $data['needs_repainting'] ?? false;
            $object->file_size = $data['file_size'] ?? null;

            return $object;
        }
    }