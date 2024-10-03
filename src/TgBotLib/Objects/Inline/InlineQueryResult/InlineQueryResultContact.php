<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineKeyboardMarkup;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\InputMessageContent;

    class InlineQueryResultContact extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $phone_number;
        private string $first_name;
        private ?string $last_name;
        private ?string $vcard;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?InputMessageContent $input_message_content;
        private ?string $thumbnail_url;
        private ?int $thumbnail_width;
        private ?int $thumbnail_height;

        /**
         * Contact's phone number
         *
         * @return string
         */
        public function getPhoneNumber(): string
        {
            return $this->phone_number;
        }

        /**
         * Sets the value of 'phone_number' property
         * Contact's phone number
         *
         * @param string $phone_number
         * @return $this
         */
        public function setPhoneNumber(string $phone_number): self
        {
            $this->phone_number = $phone_number;
            return $this;
        }

        /**
         * Contact's first name
         *
         * @return string
         */
        public function getFirstName(): string
        {
            return $this->first_name;
        }

        /**
         * Sets the value of 'first_name' property
         * Contact's first name
         *
         * @param string $first_name
         * @return $this
         */
        public function setFirstName(string $first_name): self
        {
            $this->first_name = $first_name;
            return $this;
        }

        /**
         * Optional. Contact's last name
         *
         * @return string|null
         */
        public function getLastName(): ?string
        {
            return $this->last_name;
        }

        /**
         * Sets the value of 'last_name' property
         * Optional. Contact's last name
         *
         * @param string|null $last_name
         * @return $this
         */
        public function setLastName(?string $last_name): self
        {
            $this->last_name = $last_name;
            return $this;
        }

        /**
         * Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
         *
         * @return string|null
         */
        public function getVcard(): ?string
        {
            return $this->vcard;
        }

        /**
         * Sets the value of 'vcard' property
         * Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
         *
         * @param string|null $vcard
         * @return $this
         */
        public function setVcard(?string $vcard): self
        {
            if(!Validate::length($vcard, 0, 2048))
            {
                throw new InvalidArgumentException('vcard should be between 0-2048 characters');
            }

            $this->vcard = $vcard;
            return $this;
        }

        /**
         * Optional. Inline keyboard attached to the message
         *
         * @return InlineKeyboardMarkup|null
         */
        public function getReplyMarkup(): ?InlineKeyboardMarkup
        {
            return $this->reply_markup;
        }

        /**
         * Sets the value of 'reply_markup' property
         * Optional. Inline keyboard attached to the message
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return $this
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): self
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the contact
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of 'input_message_content' property
         * Optional. Content of the message to be sent instead of the contact
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): self
        {
            $this->input_message_content = $input_message_content;
            return $this;
        }

        /**
         * Optional. Url of the thumbnail for the result
         *
         * @return string|null
         */
        public function getThumbnailUrl(): ?string
        {
            return $this->thumbnail_url;
        }

        /**
         * Sets the value of 'thumbnail_url' property
         * Optional. Url of the thumbnail for the result
         *
         * @param string|null $thumbnail_url
         * @return $this
         */
        public function setThumbnailUrl(?string $thumbnail_url): self
        {
            $this->thumbnail_url = $thumbnail_url;
            return $this;
        }

        /**
         * Optional. Thumbnail width
         *
         * @return int|null
         */
        public function getThumbnailWidth(): ?int
        {
            return $this->thumbnail_width;
        }

        /**
         * Sets the value of 'thumbnail_width' property
         * Optional. Thumbnail width
         *
         * @param int|null $thumbnail_width
         * @return $this
         */
        public function setThumbnailWidth(?int $thumbnail_width): self
        {
            $this->thumbnail_width = $thumbnail_width;
            return $this;
        }

        /**
         * Optional. Thumbnail height
         *
         * @return int|null
         */
        public function getThumbnailHeight(): ?int
        {
            return $this->thumbnail_height;
        }

        /**
         * Sets the value of 'thumbnail_height' property
         * Optional. Thumbnail height
         *
         * @param int|null $thumbnail_height
         * @return $this
         */
        public function setThumbnailHeight(?int $thumbnail_height): self
        {
            $this->thumbnail_height = $thumbnail_height;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
                'id' => $this->id,
                'phone_number' => $this->phone_number,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'vcard' => $this->vcard,
                'reply_markup' => $this->reply_markup?->toArray(),
                'input_message_content' => $this->input_message_content?->toArray(),
                'thumbnail_url' => $this->thumbnail_url,
                'thumbnail_width' => $this->thumbnail_width,
                'thumbnail_height' => $this->thumbnail_height
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(array $data): InlineQueryResultContact
        {
            $object = new self();
            $object->type = InlineQueryResultType::CONTACT;
            $object->id = $data['id'] ?? null;
            $object->phone_number = $data['phone_number'] ?? null;
            $object->first_name = $data['first_name'] ?? null;
            $object->last_name = $data['last_name'] ?? null;
            $object->vcard = $data['vcard'] ?? null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_width = $data['thumbnail_width'] ?? null;
            $object->thumbnail_height = $data['thumbnail_height'] ?? null;

            return $object;
        }
    }