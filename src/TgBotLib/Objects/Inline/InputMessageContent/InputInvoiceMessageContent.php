<?php

    /** @noinspection PhpUnused */

    namespace TgBotLib\Objects\Inline\InputMessageContent;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Enums\Types\InputMessageContentType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\LabeledPrice;

    class InputInvoiceMessageContent extends InputMessageContent implements ObjectTypeInterface
    {
        private string $title;
        private string $description;
        private string $payload;
        private string $provider_token;
        private string $currency;
        /**
         * @var LabeledPrice[]
         */
        private array $prices;
        private ?int $max_tip_amount;
        /**
         * @var int[]|null
         */
        private ?array $suggested_tip_amounts;
        private ?string $provider_data;
        private ?string $photo_url;
        private ?int $photo_size;
        private ?int $photo_width;
        private ?int $photo_height;
        private bool $need_name;
        private bool $need_phone_number;
        private bool $need_email;
        private bool $need_shipping_address;
        private bool $send_phone_number_to_provider;
        private bool $send_email_to_provider;
        private bool $is_flexible;

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
         * Sets the value of 'title' property
         * Product name, 1-32 characters
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): self
        {
            if(!Validate::length($title, 1, 32))
            {
                throw new InvalidArgumentException('title should be between 1-32 characters');
            }

            $this->title = $title;
            return $this;
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
         * Sets the value of 'description' property
         * Product description, 1-255 characters
         *
         * @param string $description
         * @return $this
         */
        public function setDescription(string $description): self
        {
            if(!Validate::length($description, 1, 255))
            {
                throw new InvalidArgumentException('description should be between 1-255 characters');
            }

            $this->description = $description;
            return $this;
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
         * Set's the value of 'payload' property
         * Bot-defined invoice payload, 1-128 bytes.
         *
         * @param string $payload
         * @return $this
         */
        public function setPayload(string $payload): self
        {
            if(!Validate::length($payload, 1, 128))
            {
                throw new InvalidArgumentException('payload should be between 1-128 characters');
            }

            $this->payload = $payload;
            return $this;
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
         * Sets the value of 'provider_token' property
         * Payment provider token, obtained via @BotFather
         *
         * @param string $provider_token
         * @return $this
         */
        public function setProviderToken(string $provider_token): self
        {
            $this->provider_token = $provider_token;
            return $this;
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
         * Sets the value of 'currency' property
         * Three-letter ISO 4217 currency code, see more on currencies
         *
         * @param string $currency
         * @return $this
         */
        public function setCurrency(string $currency): self
        {
            if(!Validate::length($currency, 3, 3))
            {
                throw new InvalidArgumentException('currency should be 3 characters');
            }

            $this->currency = $currency;
            return $this;
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
         * Adds a price to the list of prices
         *
         * @param LabeledPrice $price
         * @return $this
         */
        public function addPrice(LabeledPrice $price): self
        {
            $this->prices[] = $price;
            return $this;
        }

        /**
         * Clears the current list of prices
         *
         * @return $this
         */
        public function clearPrices(): self
        {
            $this->prices = [];
            return $this;
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
         * Sets the value of 'max_tip_amount' property
         * Optional. The maximum accepted amount for tips in the smallest units of the currency
         * (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the
         * exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency
         * (2 for the majority of currencies). Defaults to 0
         *
         * @param int $max_tip_amount
         * @return $this
         */
        public function setMaxTipAmount(int $max_tip_amount): self
        {
            $this->max_tip_amount = $max_tip_amount;
            return $this;
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
         * Sets the value of 'suggested_tip_amounts' property
         * Optional. A JSON-serialized array of suggested amounts of tip in the smallest units of the currency
         * (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts
         * must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
         *
         * @param array $suggested_tip_amounts
         * @return $this
         */
        public function setSuggestionsTipAmounts(array $suggested_tip_amounts): self
        {
            $this->suggested_tip_amounts = $suggested_tip_amounts;
            return $this;
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
         * Sets the value of 'provider_data' property
         * Optional. A JSON-serialized object for data about the invoice, which will be shared with the payment provider.
         * A detailed description of the required fields should be provided by the payment provider.
         *
         * @param string|null $provider_data
         * @return $this
         */
        public function setProviderData(?string $provider_data): self
        {
            if($provider_data === null)
            {
                $this->provider_data = null;
                return $this;
            }

            $this->provider_data = $provider_data;
            return $this;
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
         * Sets the value of 'photo_url' property
         * Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
         *
         * @param string|null $photo_url
         * @return $this
         */
        public function setPhotoUrl(?string $photo_url): self
        {
            if($photo_url === null)
            {
                $this->photo_url = null;
                return $this;
            }

            $this->photo_url = $photo_url;
            return $this;
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
         * Sets the value of 'photo_size' property
         * Optional. Photo size in bytes
         *
         * @param int|null $photo_size
         * @return $this
         */
        public function setPhotoSize(?int $photo_size): self
        {
            if($photo_size === null)
            {
                $this->photo_size = null;
                return $this;
            }

            $this->photo_size = $photo_size;
            return $this;
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
         * Sets the value of 'photo_width' property
         * Optional. Photo width
         *
         * @param int|null $photo_width
         * @return $this
         */
        public function setPhotoWidth(?int $photo_width): self
        {
            if($photo_width === null)
            {
                $this->photo_width = null;
                return $this;
            }

            $this->photo_width = $photo_width;
            return $this;
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
         * Sets the value of 'photo_height' property
         * Optional. Photo height
         *
         * @param int|null $photo_height
         * @return $this
         */
        public function setPhotoHeight(?int $photo_height): self
        {
            if($photo_height === null)
            {
                $this->photo_height = null;
                return $this;
            }

            $this->photo_height = $photo_height;
            return $this;
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
         * Sets the value of 'need_name' property
         * Optional. Pass True if you require the user's full name to complete the order
         *
         * @param bool $need_name
         * @return $this
         */
        public function setNeedName(bool $need_name): self
        {
            $this->need_name = $need_name;
            return $this;
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
         * Sets the value of 'need_phone_number' property
         * Optional. Pass True if you require the user's phone number to complete the order
         *
         * @param bool $need_phone_number
         * @return $this
         */
        public function setNeedPhoneNumber(bool $need_phone_number): self
        {
            $this->need_phone_number = $need_phone_number;
            return $this;
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
         * Sets the value of 'need_email' property
         * Optional. Pass True if you require the user's email address to complete the order
         *
         * @param bool $need_email
         * @return $this
         */
        public function setNeedEmail(bool $need_email): self
        {
            $this->need_email = $need_email;
            return $this;
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
         * Sets the value of 'need_shipping_address' property
         * Optional. Pass True if you require the user's shipping address to complete the order
         *
         * @param bool $need_shipping_address
         * @return $this
         */
        public function setNeedShippingAddress(bool $need_shipping_address): self
        {
            $this->need_shipping_address = $need_shipping_address;
            return $this;
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
         * Sets the value of 'send_phone_number_to_provider' property
         * Optional. Pass True if the user's phone number should be sent to provider
         *
         * @param bool $send_phone_number_to_provider
         * @return $this
         */
        public function setSendPhoneNumberToProvider(bool $send_phone_number_to_provider): self
        {
            $this->send_phone_number_to_provider = $send_phone_number_to_provider;
            return $this;
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
         * Sets the value of 'send_email_to_provider' property
         * Optional. Pass True if the user's email address should be sent to provider
         *
         * @param bool $send_email_to_provider
         * @return $this
         */
        public function setSendEmailToProvider(bool $send_email_to_provider): self
        {
            $this->send_email_to_provider = $send_email_to_provider;
            return $this;
        }

        /**
         * Optional. Pass True if the final price depends on the shipping method
         *
         * @return bool
         */
        public function isFlexible(): bool
        {
            return $this->is_flexible;
        }

        /**
         * Sets the value of 'is_flexible' property
         * Optional. Pass True if the final price depends on the shipping method
         *
         * @param bool $is_flexible
         * @return $this
         */
        public function setIsFlexible(bool $is_flexible): self
        {
            $this->is_flexible = $is_flexible;
            return $this;
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
                'prices' => array_map(fn(LabeledPrice $labeled_price) => $labeled_price->toArray(), $this->prices),
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
        public static function fromArray(?array $data): ?InputInvoiceMessageContent
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InputMessageContentType::INVOICE;
            $object->title = $data['title'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->payload = $data['payload'] ?? null;
            $object->provider_token = $data['provider_token'] ?? null;
            $object->currency = $data['currency'] ?? null;
            $object->prices = array_map(fn(array $prices) => LabeledPrice::fromArray($prices), $data['prices']);
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