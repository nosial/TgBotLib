<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Currency implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $code;

        /**
         * @var string
         */
        private $title;

        /**
         * @var string
         */
        private $symbol;

        /**
         * @var string
         */
        private $native;

        /**
         * @var string
         */
        private $thousands_sep;

        /**
         * @var string
         */
        private $decimal_sep;

        /**
         * @var bool
         */
        private $symbol_left;

        /**
         * @var bool
         */
        private $space_between;

        /**
         * @var int
         */
        private $exp;

        /**
         * @var string
         */
        private $min_amount;

        /**
         * @var string
         */
        private $max_amount;

        /**
         * @return string
         */
        public function getCode(): string
        {
            return $this->code;
        }

        /**
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * @return string
         */
        public function getSymbol(): string
        {
            return $this->symbol;
        }

        /**
         * @return string
         */
        public function getNative(): string
        {
            return $this->native;
        }

        /**
         * @return string
         */
        public function getThousandsSep(): string
        {
            return $this->thousands_sep;
        }

        /**
         * @return string
         */
        public function getDecimalSep(): string
        {
            return $this->decimal_sep;
        }

        /**
         * @return bool
         */
        public function isSymbolLeft(): bool
        {
            return $this->symbol_left;
        }

        /**
         * @return bool
         */
        public function isSpaceBetween(): bool
        {
            return $this->space_between;
        }

        /**
         * @return int
         */
        public function getExp(): int
        {
            return $this->exp;
        }

        /**
         * @return string
         */
        public function getMinAmount(): string
        {
            return $this->min_amount;
        }

        /**
         * @return string
         */
        public function getMaxAmount(): string
        {
            return $this->max_amount;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'code' => $this->code,
                'title' => $this->title,
                'symbol' => $this->symbol,
                'native' => $this->native,
                'thousands_sep' => $this->thousands_sep,
                'decimal_sep' => $this->decimal_sep,
                'symbol_left' => $this->symbol_left,
                'space_between' => $this->space_between,
                'exp' => $this->exp,
                'min_amount' => $this->min_amount,
                'max_amount' => $this->max_amount,
            ];
        }

        /**
         * Constructs the object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->code = $data['code'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->symbol = $data['symbol'] ?? null;
            $object->native = $data['native'] ?? null;
            $object->thousands_sep = $data['thousands_sep'] ?? null;
            $object->decimal_sep = $data['decimal_sep'] ?? null;
            $object->symbol_left = $data['symbol_left'] ?? null;
            $object->space_between = $data['space_between'] ?? null;
            $object->exp = $data['exp'] ?? null;
            $object->min_amount = $data['min_amount'] ?? null;
            $object->max_amount = $data['max_amount'] ?? null;

            return $object;
        }
    }