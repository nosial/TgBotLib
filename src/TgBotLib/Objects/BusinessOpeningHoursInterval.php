<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BusinessOpeningHoursInterval implements ObjectTypeInterface
    {
        private int $opening_minute;
        private int $closing_minute;

        /**
         * The minute's sequence number in a week, starting on Monday,
         * marking the start of the time interval during which the business is open; 0 - 7 * 24 * 60
         *
         * @return int
         */
        public function getOpeningMinute(): int
        {
            return $this->opening_minute;
        }

        /**
         * The minute's sequence number in a week, starting on Monday,
         * marking the end of the time interval during which the business is open; 0 - 8 * 24 * 60
         *
         * @return int
         */
        public function getClosingMinute(): int
        {
            return $this->closing_minute;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'opening_minute' => $this->opening_minute,
                'closing_minute' => $this->closing_minute,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BusinessOpeningHoursInterval
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->opening_minute = $data['opening_minute'];
            $object->closing_minute = $data['closing_minute'];

            return $object;
        }
    }