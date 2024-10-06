<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoChatEnded implements ObjectTypeInterface
    {
        private int $duration;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'duration' => $this->duration,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?VideoChatEnded
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->duration = $data['duration'];

            return $object;
        }


    }