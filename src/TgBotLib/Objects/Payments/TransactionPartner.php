<?php

    namespace TgBotLib\Objects\Payments;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\TransactionPartnerType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Payments\TransactionPartner\TransactionPartnerFragment;
    use TgBotLib\Objects\Payments\TransactionPartner\TransactionPartnerOther;
    use TgBotLib\Objects\Payments\TransactionPartner\TransactionPartnerTelegramAds;
    use TgBotLib\Objects\Payments\TransactionPartner\TransactionPartnerUser;

    abstract class TransactionPartner implements ObjectTypeInterface
    {
        protected TransactionPartnerType $type;

        /**
         * Returns the TransactionPartnerType
         *
         * @return TransactionPartnerType
         */
        public function getType(): TransactionPartnerType
        {
            return $this->type;
        }

        /**
         * @inheritDoc
         */
        public abstract function toArray(): ?array;

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?TransactionPartner
        {
            if($data === null)
            {
                return null;
            }

            if(!isset($data['type']))
            {
                throw new InvalidArgumentException('type is not provided');
            }

            return match(TransactionPartnerType::tryFrom($data['type']))
            {
                TransactionPartnerType::USER => TransactionPartnerUser::fromArray($data),
                TransactionPartnerType::FRAGMENT => TransactionPartnerFragment::fromArray($data),
                TransactionPartnerType::TELEGRAM_ADS => TransactionPartnerTelegramAds::fromArray($data),
                TransactionPartnerType::OTHER => TransactionPartnerOther::fromArray($data),
                default => throw new InvalidArgumentException('Unknown TransactionPartnerType')
            };
        }
    }