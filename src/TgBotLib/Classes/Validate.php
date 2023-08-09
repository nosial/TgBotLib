<?php

    namespace TgBotLib\Classes;

    class Validate
    {
        /**
         * Validates if a URL is valid or not
         *
         * @param string $url
         * @return bool
         */
        public static function url(string $url): bool
        {
            return filter_var($url, FILTER_VALIDATE_URL) !== false;
        }

        /**
         * Returns true if the given input is within the specified length range
         *
         * @param string $input
         * @param int $min_length
         * @param int $max_length
         * @return bool
         */
        public static function length(string $input, int $min_length, int $max_length): bool
        {
            $length = strlen($input);
            return $length >= $min_length && $length <= $max_length;
        }

        /**
         * Determines if the given URL is an HTTPS URL
         *
         * @param string $url
         * @return bool
         */
        public static function isHttps(string $url): bool
        {
            return strpos($url, 'https://') === 0;
        }
    }