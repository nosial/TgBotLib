<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoChatEnded implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $duration;

        /**
         * Video chat duration in seconds
         *
         * @return int
         */
        public function getDuration(): int
        {
            return $this->duration;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'duration' => $this->duration,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return VideoChatEnded
         */
        public static function fromArray(array $data): self
        {
            $object = new self();
            $object->duration = $data['duration'];
            return $object;
        }


    }