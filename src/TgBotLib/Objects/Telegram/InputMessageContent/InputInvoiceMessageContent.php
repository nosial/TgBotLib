<?php

    /** @noinspection PhpMissingFieldTypeInspection */
    /** @noinspection PhpUnused */

    namespace TgBotLib\Objects\Telegram\InputMessageContent;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\LabeledPrice;

    class InputInvoiceMessageContent implements \TgBotLib\Interfaces\ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $title;

        /**
         * @var string
         */
        private $description;

        /**
         * @var string
         */
        private $payload;

        /**
         * @var string
         */
        private $provider_token;

        /**
         * @var string
         */
        private $currency;

        /**
         * @var LabeledPrice[]
         */
        private $prices;

        /**
         * @var int|null
         */
        private $max_tip_amount;

        /**
         * @var int[]|null
         */
        private $suggested_tip_amounts;

        /**
         * @var string|null
         */
        private $provider_data;

        /**
         * @var string|null
         */
        private $photo_url;

        /**
         * @var int|null
         */
        private $photo_size;

        /**
         * @var int|null
         */
        private $photo_width;

        /**
         * @var int|null
         */
        private $photo_height;

        /**
         * @var bool
         */
        private $need_name;

        /**
         * @var bool
         */
        private $need_phone_number;

        /**
         * @var bool
         */
        private $need_email;

        /**
         * @var bool
         */
        private $need_shipping_address;

        /**
         * @var bool
         */
        private $send_phone_number_to_provider;

        /**
         * @var bool
         */
        private $send_email_to_provider;

        /**
         * @var bool
         */
        private $is_flexible;

        /**
         * Product name, 1-32 characters
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Product description, 1-255 characters
         *
         * @return string
         */
        public function getDescription(): string
        {
            return $this->description;
        }

        /**
         * Bot-defined invoice payload, 1-128 bytes.
         * This will not be displayed to the user, use for your internal processes.
         *
         * @return string
         */
        public function getPayload(): string
        {
            return $this->payload;
        }

        /**
         * Payment provider token, obtained via @BotFather
         *
         * @see https://t.me/botfather
         * @return string
         */
        public function getProviderToken(): string
        {
            return $this->provider_token;
        }

        /**
         * Three-letter ISO 4217 currency code
         *
         * @return string
         * @link https://core.telegram.org/bots/payments#supported-currencies
         */
        public function getCurrency(): string
        {
            return $this->currency;
        }

        /**
         * Price breakdown, a JSON-serialized list of components
         * (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
         *
         * @return LabeledPrice[]
         */
        public function getPrices(): array
        {
            return $this->prices;
        }

        /**
         * Optional. The maximum accepted amount for tips in the smallest units of the currency
         * (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the
         * exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency
         * (2 for the majority of currencies). Defaults to 0
         *
         * @return int|null
         */
        public function getMaxTipAmount(): ?int
        {
            return $this->max_tip_amount;
        }

        /**
         * Optional. A JSON-serialized array of suggested amounts of tip in the smallest units of the currency
         * (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts
         * must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
         *
         * @return int[]|null
         */
        public function getSuggestedTipAmounts(): ?array
        {
            return $this->suggested_tip_amounts;
        }

        /**
         * Optional. A JSON-serialized object for data about the invoice, which will be shared with the payment provider.
         * A detailed description of the required fields should be provided by the payment provider.
         *
         * @return string|null
         */
        public function getProviderData(): ?string
        {
            return $this->provider_data;
        }

        /**
         * Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
         *
         * @return string|null
         */
        public function getPhotoUrl(): ?string
        {
            return $this->photo_url;
        }

        /**
         * Optional. Photo size in bytes
         *
         * @return int|null
         */
        public function getPhotoSize(): ?int
        {
            return $this->photo_size;
        }

        /**
         * Optional. Photo width
         *
         * @return int|null
         */
        public function getPhotoWidth(): ?int
        {
            return $this->photo_width;
        }

        /**
         * Optional. Photo height
         *
         * @return int|null
         */
        public function getPhotoHeight(): ?int
        {
            return $this->photo_height;
        }

        /**
         * Optional. Pass True if you require the user's full name to complete the order
         *
         * @return bool
         */
        public function needName(): bool
        {
            return $this->need_name;
        }

        /**
         * Optional. Pass True if you require the user's phone number to complete the order
         *
         * @return bool
         */
        public function needPhoneNumber(): bool
        {
            return $this->need_phone_number;
        }

        /**
         * Optional. Pass True if you require the user's email address to complete the order
         *
         * @return bool
         */
        public function needEmail(): bool
        {
            return $this->need_email;
        }

        /**
         * Optional. Pass True if you require the user's shipping address to complete the order
         *
         * @return bool
         */
        public function needShippingAddress(): bool
        {
            return $this->need_shipping_address;
        }

        /**
         * Optional. Pass True if the user's phone number should be sent to provider
         *
         * @return bool
         */
        public function isSendPhoneNumberToProvider(): bool
        {
            return $this->send_phone_number_to_provider;
        }

        /**
         * Optional. Pass True if the user's email address should be sent to provider
         *
         * @return bool
         */
        public function isSendEmailToProvider(): bool
        {
            return $this->send_email_to_provider;
        }

        /**
         * Optional. Pass True if the final price depends on the shipping method
         *
         * @return bool
         */
        public function isIsFlexible(): bool
        {
            return $this->is_flexible;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'title' => $this->title,
                'description' => $this->description,
                'payload' => $this->payload,
                'provider_token' => $this->provider_token,
                'currency' => $this->currency,
                'prices' => array_map(function (LabeledPrice $price) {
                    return $price->toArray();
                }, $this->prices),
                'max_tip_amount' => $this->max_tip_amount,
                'suggested_tip_amounts' => $this->suggested_tip_amounts,
                'provider_data' => $this->provider_data,
                'photo_url' => $this->photo_url,
                'photo_size' => $this->photo_size,
                'photo_width' => $this->photo_width,
                'photo_height' => $this->photo_height,
                'need_name' => $this->need_name,
                'need_phone_number' => $this->need_phone_number,
                'need_email' => $this->need_email,
                'need_shipping_address' => $this->need_shipping_address,
                'send_phone_number_to_provider' => $this->send_phone_number_to_provider,
                'send_email_to_provider' => $this->send_email_to_provider,
                'is_flexible' => $this->is_flexible,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->title = $data['title'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->payload = $data['payload'] ?? null;
            $object->provider_token = $data['provider_token'] ?? null;
            $object->currency = $data['currency'] ?? null;
            $object->prices = array_map(function (array $price) {
                return LabeledPrice::fromArray($price);
            }, $data['prices'] ?? []);
            $object->max_tip_amount = $data['max_tip_amount'] ?? null;
            $object->suggested_tip_amounts = $data['suggested_tip_amounts'] ?? null;
            $object->provider_data = $data['provider_data'] ?? null;
            $object->photo_url = $data['photo_url'] ?? null;
            $object->photo_size = $data['photo_size'] ?? null;
            $object->photo_width = $data['photo_width'] ?? null;
            $object->photo_height = $data['photo_height'] ?? null;
            $object->need_name = $data['need_name'] ?? false;
            $object->need_phone_number = $data['need_phone_number'] ?? false;
            $object->need_email = $data['need_email'] ?? false;
            $object->need_shipping_address = $data['need_shipping_address'] ?? false;
            $object->send_phone_number_to_provider = $data['send_phone_number_to_provider'] ?? false;
            $object->send_email_to_provider = $data['send_email_to_provider'] ?? false;
            $object->is_flexible = $data['is_flexible'] ?? false;

            return $object;
        }
    }