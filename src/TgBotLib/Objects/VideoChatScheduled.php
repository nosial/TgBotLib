<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoChatScheduled implements ObjectTypeInterface
    {
        private int $start_date;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'start_date' => $this->start_date,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?VideoChatScheduled
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->start_date = $data['start_date'];

            return $object;
        }
    }