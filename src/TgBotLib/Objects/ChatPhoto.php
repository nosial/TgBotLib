<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatPhoto implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $small_file_id;

        /**
         * @var string
         */
        private $small_file_unique_id;

        /**
         * @var string
         */
        private $big_file_id;

        /**
         * @var string
         */
        private $big_file_unique_id;

        /**
         * File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for
         * as long as the photo is not changed.
         *
         * @return string
         */
        public function getSmallFileId(): string
        {
            return $this->small_file_id;
        }

        /**
         *  Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for
         * different bots. Can't be used to download or reuse the file.
         *
         * @return string
         */
        public function getSmallFileUniqueId(): string
        {
            return $this->small_file_unique_id;
        }

        /**
         * File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only
         * for as long as the photo is not changed.
         *
         * @return string
         */
        public function getBigFileId(): string
        {
            return $this->big_file_id;
        }

        /**
         * Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for
         * different bots. Can't be used to download or reuse the file.
         *
         * @return string
         */
        public function getBigFileUniqueId(): string
        {
            return $this->big_file_unique_id;
        }

        /**
         * Returns an array representation of this object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'small_file_id' => $this->small_file_id,
                'small_file_unique_id' => $this->small_file_unique_id,
                'big_file_id' => $this->big_file_id,
                'big_file_unique_id' => $this->big_file_unique_id,
            ];
        }

        /**
         * Constructs a new ChatPhoto object from an array representation
         *
         * @param array $data
         * @return static
         */
        public static function fromArray(array $data): self
        {
            $object = new ChatPhoto();

            $object->small_file_id = $data['small_file_id'] ?? null;
            $object->small_file_unique_id = $data['small_file_unique_id'] ?? null;
            $object->big_file_id = $data['big_file_id'] ?? null;
            $object->big_file_unique_id = $data['big_file_unique_id'] ?? null;

            return $object;
        }

    }