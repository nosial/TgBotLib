<?php

    namespace TgBotLib;

    class Bot
    {
        /**
         * The bot's token
         *
         * @var string
         */
        private $token;

        /**
         * Public Constructor
         *
         * @param string $token
         */
        public function __construct(string $token)
        {
            $this->token = $token;
        }

        /**
         * @return string
         */
        public function getToken(): string
        {
            return $this->token;
        }
    }