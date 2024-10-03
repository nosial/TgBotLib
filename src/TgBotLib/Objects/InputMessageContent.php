<?php

    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\InputMessageContentType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMessageContent\InputInvoiceMessageContent;
    use TgBotLib\Objects\InputMessageContent\InputLocationMessageContent;
    use TgBotLib\Objects\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\InputMessageContent\InputVenueMessageContent;

    abstract class InputMessageContent implements ObjectTypeInterface
    {
        protected InputMessageContentType $type;

        /**
         * Returns the type for the Input message content
         *
         * @return InputMessageContentType
         */
        public function getType(): InputMessageContentType
        {
            return $this->type;
        }

        /**
         * @inheritDoc
         */
        public abstract function toArray(): array;

        /**
         * @inheritDoc
         */
        public static function fromArray(array $data): InputMessageContent
        {
            if(isset($data['message_text']))
            {
                return InputTextMessageContent::fromArray($data);
            }

            if(isset($data['latitude']) && isset($data['longitude']) && isset($data['tile']) && isset($data['address']))
            {
                return InputVenueMessageContent::fromArray($data);
            }

            if(isset($data['latitude']) && isset($data['longitude']))
            {
                return InputLocationMessageContent::fromArray($data);
            }

            if(isset($data['title']) && isset($data['description']) && isset($data['payload']))
            {
                return InputInvoiceMessageContent::fromArray($data);
            }

            throw new InvalidArgumentException("Invalid object type, unexpected type");
        }
    }