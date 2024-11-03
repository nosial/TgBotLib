<?php


    namespace TgBotLib\Classes;

    use Exception;
    use LogLib\Log;
    use TgBotLib\Objects\Currency;

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
    }