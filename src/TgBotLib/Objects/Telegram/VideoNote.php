<?php

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoNote implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $file_id;

        /**
         * @var string
         */
        private $file_unique_id;

        /**
         * @var int
         */
        private $length;

        /**
         * @var int
         */
        private $duration;

        /**
         * @var PhotoSize|null
         */
        private $thumb;

        /**
         * @var int|null
         */
        private $file_size;

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
         * Unique identifier for this file, which is supposed to be the same over time
         * and for different bots. Can't be used to download or reuse the file.
         *
         * @return string
         */
        public function getFileUniqueId(): string
        {
            return $this->file_unique_id;
        }

        /**
         * Video width and height (diameter of the video message) as defined by sender
         *
         * @return int
         */
        public function getLength(): int
        {
            return $this->length;
        }

        /**
         * Duration of the video in seconds as defined by sender
         *
         * @return int
         */
        public function getDuration(): int
        {
            return $this->duration;
        }

        /**
         * Optional. Video thumbnail
         *
         * @return PhotoSize|null
         */
        public function getThumb(): ?PhotoSize
        {
            return $this->thumb;
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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'file_id' => $this->file_id,
                'file_unique_id' => $this->file_unique_id,
                'length' => $this->length,
                'duration' => $this->duration,
                'thumb' => ($this->thumb instanceof ObjectTypeInterface) ? $this->thumb->toArray() : $this->thumb,
                'file_size' => $this->file_size,
            ];
        }

        /**
         * Constructs the object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->file_id = $data['file_id'];
            $object->file_unique_id = $data['file_unique_id'];
            $object->length = $data['length'];
            $object->duration = $data['duration'];
            $object->thumb = (isset($data['thumb'])) ? PhotoSize::fromArray($data['thumb']) : null;
            $object->file_size = $data['file_size'];

            return $object;
        }
    }