<?php

    namespace TgBotLib\Objects;

    use LogLib\Log;
    use TgBotLib\Exceptions\NotImplementedException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMessageContent\InputContactMessageContent;
    use TgBotLib\Objects\InputMessageContent\InputInvoiceMessageContent;
    use TgBotLib\Objects\InputMessageContent\InputLocationMessageContent;
    use TgBotLib\Objects\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\InputMessageContent\InputVenueMessageContent;

    class InputMessageContent implements ObjectTypeInterface
    {
        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            throw new NotImplementedException('This object is abstract, you can\'t use it directly, try constructing one of the child classes with fromArray()');
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            // You may be wondering why this is needed, it's because Telegram Developers can't
            // actually write good software, they tend to forget the little things.
            // Like for example, providing the type of the object in the JSON response.
            // So this little code snippet is needed to determine the type of the object. :(
            //
            // Thanks Telegram!

            if(isset($data['provider_token']))
            {
                return InputInvoiceMessageContent::fromArray($data);
            }

            if(isset($data['phone_number']))
            {
                return InputContactMessageContent::fromArray($data);
            }

            if(isset($data['address']))
            {
                return InputVenueMessageContent::fromArray($data);
            }

            if(isset($data['longitude']) && isset($data['latitude']))
            {
                return InputLocationMessageContent::fromArray($data);
            }

            if(isset($data['message_text']))
            {
                return InputTextMessageContent::fromArray($data);
            }

            Log::warning('net.nosial.tgbotlib', 'InputMessageContent::fromArray() - Unknown type of InputMessageContent, returning InputTextMessageContent (go complain to Telegram)');
            return InputTextMessageContent::fromArray($data);
        }
    }