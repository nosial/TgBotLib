<?php

    namespace TgBotLib\Objects\Payments\RevenueWithdrawalState;

    use TgBotLib\Enums\Types\RevenueWithdrawalType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Payments\RevenueWithdrawalState;

    class RevenueWithdrawalStateSucceeded extends RevenueWithdrawalState implements ObjectTypeInterface
    {
        private int $date;
        private string $url;

        /**
         * Date the withdrawal was completed in Unix time
         *
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * An HTTPS URL that can be used to see transaction details
         *
         * @return string
         */
        public function getUrl(): string
        {
            return $this->url;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'type' => $this->type->value,
                'date' => $this->date,
                'url' => $this->url,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?RevenueWithdrawalStateSucceeded
        {
            if (is_null($data))
            {
                return null;
            }

            $object = new self();
            $object->type = RevenueWithdrawalType::SUCCEEDED;
            $object->date = $data['date'];
            $object->url = $data['url'];

            return $object;
        }
    }