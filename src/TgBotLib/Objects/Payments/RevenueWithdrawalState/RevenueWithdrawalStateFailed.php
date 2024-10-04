<?php

    namespace TgBotLib\Objects\Payments\RevenueWithdrawalState;

    use TgBotLib\Enums\Types\RevenueWithdrawalType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Payments\RevenueWithdrawalState;

    class RevenueWithdrawalStateFailed extends RevenueWithdrawalState implements ObjectTypeInterface
    {
        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'type' => $this->type->value,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?RevenueWithdrawalStateFailed
        {
            if (is_null($data))
            {
                return null;
            }

            $object = new self();
            $object->type = RevenueWithdrawalType::FAILED;

            return $object;
        }
    }