<?php


    namespace TgBotLib\Objects\Passport;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PassportFile implements ObjectTypeInterface
    {
        private string $file_id;
        private string $file_unique_id;
        private int $file_size;
        private int $file_date;

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
         * File size in bytes
         *
         * @return int
         */
        public function getFileSize(): int
        {
            return $this->file_size;
        }

        /**
         * Unix time when the file was uploaded
         *
         * @return int
         */
        public function getFileDate(): int
        {
            return $this->file_date;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'file_id' => $this->file_id,
                'file_unique_id' => $this->file_unique_id,
                'file_size' => $this->file_size,
                'file_date' => $this->file_date,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?PassportFile
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->file_id = $data['file_id'] ?? null;
            $object->file_unique_id = $data['file_unique_id'] ?? null;
            $object->file_size = $data['file_size'] ?? null;
            $object->file_date = $data['file_date'] ?? null;

            return $object;
        }
    }