<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Gifts implements ObjectTypeInterface
    {
        /**
         * @var Gift[]
         */
        private array $gifts;

        /**
         * This object represent a list of gifts.
         *
         * @param array|null $data
         */
        public function __construct(?array $data=null)
        {
            if($data == null)
            {
                return;
            }

            $this->gifts = array_map(fn(array $items) => Gift::fromArray($items), $data['gifts'] ?? []);
        }

        /**
         * The list of gifts
         *
         * @return Gift[]
         */
        public function getGifts(): array
        {
            return $this->gifts;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'gifts' => array_map(fn(Gift $item) => $item->toArray(), $this->gifts)
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Gifts
        {
            return new self($data);
        }
    }