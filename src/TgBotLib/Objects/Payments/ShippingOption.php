<?php


    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ShippingOption implements ObjectTypeInterface
    {
        private string $id;
        private string $title;
        /**
         * @var LabeledPrice[]
         */
        private array $prices;

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
                'prices' => array_map(fn(LabeledPrice $item) => $item->toArray(), $this->prices)
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ShippingOption
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->id = $data['id'];
            $object->title = $data['title'];
            $object->prices = array_map(fn($item) => LabeledPrice::fromArray($item), $data['prices']);

            return $object;
        }
    }