<?php

    namespace TgBotLib\Classes;

    use LogLib\Log;

    class Logger
    {
        private static ?\LogLib\Logger $logger = null;

        /**
         * Retrieves the instance of the logger. If the logger instance does not
         * exist, it initializes a new logger for the application and registers
         * the exception handler.
         *
         * @return \LogLib\Logger The logger instance.
         */
        public static function getLogger(): \LogLib\Logger
        {
            if(self::$logger === null)
            {
                self::$logger = new \LogLib\Logger('net.nosial.tgbotlib');
                Log::registerExceptionHandler();
            }

            return self::$logger;
        }
    }