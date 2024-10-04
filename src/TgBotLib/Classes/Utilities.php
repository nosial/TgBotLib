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
        private static $currencies_cache;

        /**
         * Returns
         *
         * @param string $code
         * @return Currency
         * @throws Exception
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
                throw new Exception("Currency $code not found");

            return self::$currencies_cache[strtolower($code)];
        }
    }