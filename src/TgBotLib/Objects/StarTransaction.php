<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Payments\TransactionPartner;

    class StarTransaction implements ObjectTypeInterface
    {
        private string $id;
        private int $amount;
        private int $date;
        private ?TransactionPartner $source;
        private ?TransactionPartner $receiver;

        /**
         * Describes a Telegram Star transaction.
         *
         * @param array|null $data
         */
        public function __construct(?array $data=null)
        {
            if($data == null)
            {
                return;
            }

            $this->id = $data['id'];
            $this->amount = $data['amount'];
            $this->date = $data['date'];
            $this->source = isset($data['source']) ? TransactionPartner::fromArray($data['source']) : null;
            $this->receiver = isset($data['receiver']) ? TransactionPartner::fromArray($data['receiver']) : null;
        }

        /**
         * Unique identifier of the transaction. Coincides with the identifier of the original transaction for
         * refund transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for
         * successful incoming payments from users.
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Number of Telegram Stars transferred by the transaction
         *
         * @return int
         */
        public function getAmount(): int
        {
            return $this->amount;
        }

        /**
         * Date the transaction was created in Unix time
         *
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * Optional. Source of an incoming transaction
         * (e.g., a user purchasing goods or services, Fragment refunding a failed withdrawal).
         * Only for incoming transactions
         *
         * @return TransactionPartner|null
         */
        public function getSource(): ?TransactionPartner
        {
            return $this->source;
        }

        /**
         * Optional. Receiver of an outgoing transaction
         * (e.g., a user for a purchase refund, Fragment for a withdrawal).
         * Only for outgoing transactions
         *
         * @return TransactionPartner|null
         */
        public function getReceiver(): ?TransactionPartner
        {
            return $this->receiver;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'id' => $this->id,
                'amount' => $this->amount,
                'date' => $this->date,
                'source' => $this->source,
                'receiver' => $this->receiver
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?StarTransaction
        {
            return new self($data);
        }
    }