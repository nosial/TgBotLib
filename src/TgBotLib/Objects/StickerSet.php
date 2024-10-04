<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\StickerType;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class StickerSet implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $name;

        /**
         * @var string
         */
        private $title;

        /**
         * @var string
         */
        private $sticker_type;

        /**
         * @var bool
         */
        private $is_animated;

        /**
         * @var bool
         */
        private $is_video;

        /**
         * @var Sticker[]
         */
        private $stickers;

        /**
         * @var PhotoSize|null
         */
        private $thumbnail;

        /**
         * Sticker set name
         *
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * Sticker set title
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
         *
         * @return string
         * @see StickerType
         */
        public function getStickerType(): string
        {
            return $this->sticker_type;
        }

        /**
         * True, if the sticker set contains animated stickers
         *
         * @return bool
         * @link https://telegram.org/blog/animated-stickers
         */
        public function isIsAnimated(): bool
        {
            return $this->is_animated;
        }

        /**
         * True, if the sticker set contains video stickers
         *
         * @link https://telegram.org/blog/video-stickers-better-reactions
         * @return bool
         */
        public function isIsVideo(): bool
        {
            return $this->is_video;
        }

        /**
         * List of all set stickers
         *
         * @return Sticker[]
         */
        public function getStickers(): array
        {
            return $this->stickers;
        }

        /**
         * Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
         *
         * @return PhotoSize|null
         */
        public function getThumbnail(): ?PhotoSize
        {
            return $this->thumbnail;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'name' => $this->name,
                'title' => $this->title,
                'sticker_type' => $this->sticker_type,
                'is_animated' => $this->is_animated,
                'is_video' => $this->is_video,
                'stickers' => array_map(function (Sticker $sticker) {
                    return $sticker->toArray();
                }, $this->stickers),
                'thumbnail' => ($this->thumbnail instanceof PhotoSize) ? $this->thumbnail->toArray() : null,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->name = $data['name'];
            $object->title = $data['title'];
            $object->sticker_type = $data['sticker_type'];
            $object->is_animated = $data['is_animated'];
            $object->is_video = $data['is_video'];
            $object->stickers = array_map(function (array $sticker) {
                return Sticker::fromArray($sticker);
            }, $data['stickers']);
            $object->thumbnail = ($data['thumbnail'] !== null) ? PhotoSize::fromArray($data['thumbnail']) : null;

            return $object;
        }
    }