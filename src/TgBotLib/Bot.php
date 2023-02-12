<?php

    namespace TgBotLib;

    class Bot
    {
        /**
         * The bot's username
         *
         * @var string
         */
        private $username;

        /**
         * The bot's token
         *
         * @var string
         */
        private $token;

        /**
         * Public Constructor
         *
         * @param string $username
         * @param string $token
         */
        public function __construct(string $username, string $token)
        {
            $this->username = $username;
            $this->token = $token;
        }

        /**
         * @return string
         */
        public function getUsername(): string
        {
            return $this->username;
        }

        /**
         * @return string
         */
        public function getToken(): string
        {
            return $this->token;
        }
    }