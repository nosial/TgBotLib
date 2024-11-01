<?php


    namespace TgBotLib\Classes;

    use Exception;
    use LogLib\Log;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Currency;
    use TgBotLib\Objects\Update;

    class Utilities
    {
        /**
         * @var Currency[]|null
         */
        private static ?array $currencies_cache = null;

        /**
         * Retrieves the currency object associated with the given currency code.
         *
         * @param string $code The currency code to look up.
         * @return Currency The currency object corresponding to the given code.
         * @throws Exception If the currency code is not found or fetching currencies fails.
         * @deprecated Not used
         */
        public static function getCurrency(string $code): Currency
        {
            if (self::$currencies_cache === null)
            {
                $source = "https://core.telegram.org/bots/payments/currencies.json";
                Log::verbose('net.nosial.tgbotlib', "Fetching currencies from $source");

                $data = json_decode(file_get_contents($source), true);

                if ($data === null)
                    throw new Exception("Failed to fetch currencies");

                self::$currencies_cache = [];
                foreach ($data as $currency)
                {
                    self::$currencies_cache[strtolower($currency['code'])] = Currency::fromArray($currency);
                }

                Log::verbose('net.nosial.tgbotlib', "Fetched " . count(self::$currencies_cache) . " supported currencies");
            }

            if(!isset(self::$currencies_cache[strtolower($code)]))
            {
                throw new Exception("Currency $code not found");
            }

            return self::$currencies_cache[strtolower($code)];
        }

        /**
         * Determines the type of event based on the provided update object.
         *
         * @param Update $update The update object containing event information.
         * @return UpdateEventType The determined type of the event.
         */
        public static function determineEventType(Update $update): UpdateEventType
        {
            if($update->getRemovedChatBoost() !== null)
            {
                return UpdateEventType::REMOVED_CHAT_BOOST_EVENT;
            }

            if($update->getChatBoost() !== null)
            {
                return UpdateEventType::CHAT_BOOST_EVENT;
            }

            if($update->getChatJoinRequest() !== null)
            {
                return UpdateEventType::CHAT_JOIN_REQUEST_EVENT;
            }

            if($update->getChatMember() !== null)
            {
                return UpdateEventType::CHAT_MEMBER_UPDATED;
            }

            if($update->getMyChatMember() !== null)
            {
                return UpdateEventType::MY_CHAT_MEMBER_UPDATED;
            }

            if($update->getPollAnswer() !== null)
            {
                return UpdateEventType::POLL_ANSWER;
            }

            return UpdateEventType::UPDATE_EVENT;
        }
    }