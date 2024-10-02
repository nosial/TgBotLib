<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoChatScheduled implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $start_date;

        /**
         * Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
         *
         * @return int
         */
        public function getStartDate(): int
        {
            return $this->start_date;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'start_date' => $this->start_date,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return VideoChatScheduled
         */
        public static function fromArray(array $data): self
        {
            $object = new self();
            $object->start_date = $data['start_date'];
            return $object;
        }
    }