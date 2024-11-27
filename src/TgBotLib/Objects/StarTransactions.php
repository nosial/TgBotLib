<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class StarTransactions implements ObjectTypeInterface
    {
        /**
         * @var StarTransaction[]
         */
        private array $transactions;

        /**
         * Contains a list of Telegram Star transactions.
         *
         * @param array|null $data
         */
        public function __construct(?array $data=null)
        {
            if($data == null)
            {
                return;
            }

            $this->transactions = array_map(fn(array $items) => StarTransaction::fromArray($items), $data['transactions'] ?? []);
        }

        /**
         * The list of transactions
         *
         * @return StarTransaction[]
         */
        public function getTransactions(): array
        {
            return $this->transactions;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'transactions' => array_map(fn(StarTransaction $item) => $item->toArray(), $this->transactions)
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?StarTransactions
        {
            return new self($data);
        }
    }