<?php

    namespace TgBotLib\Objects\Payments;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\RevenueWithdrawalType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Payments\RevenueWithdrawalState\RevenueWithdrawalStateFailed;
    use TgBotLib\Objects\Payments\RevenueWithdrawalState\RevenueWithdrawalStatePending;
    use TgBotLib\Objects\Payments\RevenueWithdrawalState\RevenueWithdrawalStateSucceeded;

    abstract class RevenueWithdrawalState implements ObjectTypeInterface
    {
        protected RevenueWithdrawalType $type;

        /**
         * @inheritDoc
         */
        public abstract function toArray(): ?array;

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?RevenueWithdrawalState
        {
            if(is_null($data))
            {
                return null;
            }

            if(!isset($data['type']))
            {
                throw new InvalidArgumentException('type is not provided');
            }

            return match(RevenueWithdrawalType::tryFrom($data['type']))
            {
                RevenueWithdrawalType::SUCCEEDED => RevenueWithdrawalStateSucceeded::fromArray($data),
                RevenueWithdrawalType::FAILED => RevenueWithdrawalStateFailed::fromArray($data),
                RevenueWithdrawalType::PENDING => RevenueWithdrawalStatePending::fromArray($data),
                default => throw new InvalidArgumentException('Unknown RevenueWithdrawalType')
            };
        }
    }