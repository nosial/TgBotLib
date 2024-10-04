<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BusinessOpeningHours implements ObjectTypeInterface
    {
        private string $time_zone_name;
        /**
         * @var BusinessOpeningHoursInterval[]|null
         */
        private ?array $opening_hours;

        /**
         * Unique name of the time zone for which the opening hours are defined
         *
         * @return string
         */
        public function getTimeZoneName(): string
        {
            return $this->time_zone_name;
        }

        /**
         * List of time intervals describing business opening hours
         *
         * @return BusinessOpeningHoursInterval[]|null
         */
        public function getOpeningHours(): ?array
        {
            return $this->opening_hours;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'time_zone_name' => $this->time_zone_name,
                'opening_hours' => array_map(fn(BusinessOpeningHoursInterval $item) => $item->toArray(), $this->opening_hours)
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BusinessOpeningHours
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->time_zone_name = $data['time_zone_name'];
            $object->opening_hours = array_map(fn($item) => BusinessOpeningHoursInterval::fromArray($item), $data['opening_hours']);

            return $object;
        }
    }