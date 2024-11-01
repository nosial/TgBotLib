<?php


    namespace TgBotLib\Classes;

    use Exception;
    use LogLib\Log;
    use TgBotLib\Enums\EventType;
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
         * @return EventType The determined type of the event.
         */
        public static function determineEventType(Update $update): EventType
        {
            if($update->getRemovedChatBoost() !== null)
            {
                return EventType::REMOVED_CHAT_BOOST_EVENT;
            }

            if($update->getChatBoost() !== null)
            {
                return EventType::CHAT_BOOST_EVENT;
            }

            if($update->getChatJoinRequest() !== null)
            {
                return EventType::CHAT_JOIN_REQUEST_EVENT;
            }

            return EventType::UPDATE_EVENT;
        }
    }