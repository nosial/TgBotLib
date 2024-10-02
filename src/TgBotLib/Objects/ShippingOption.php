<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ShippingOption implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $id;

        /**
         * @var string
         */
        private $title;

        /**
         * @var LabeledPrice[]
         */
        private $prices;

        /**
         * Shipping option identifier
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Option title
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * List of price portions
         *
         * @return LabeledPrice[]
         */
        public function getPrices(): array
        {
            return $this->prices;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'prices' => array_map(function (LabeledPrice $price) {
                    return $price->toArray();
                }, $this->prices)
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ShippingOption
         */
        public static function fromArray(array $data): self
        {
            $object = new self();
            $object->id = $data['id'];
            $object->title = $data['title'];
            $object->prices = array_map(function (array $price) {
                return LabeledPrice::fromArray($price);
            }, $data['prices']);

            return $object;
        }
    }