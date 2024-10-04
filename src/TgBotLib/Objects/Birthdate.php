<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Birthdate implements ObjectTypeInterface
    {
        private int $day;
        private int $month;
        private ?int $year;

        /**
         * Day of the user's birth; 1-31
         *
         * @return int
         */
        public function getDay(): int
        {
            return $this->day;
        }

        /**
         * Month of the user's birth; 1-12
         *
         * @return int
         */
        public function getMonth(): int
        {
            return $this->month;
        }

        /**
         * Optional. Year of the user's birth
         *
         * @return int|null
         */
        public function getYear(): ?int
        {
            return $this->year;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'day' => $this->day,
                'month' => $this->month,
                'year' => $this->year,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Birthdate
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->day = $data['day'];
            $object->month = $data['month'];
            $object->year = $data['year'] ?? null;

            return $object;
        }
    }