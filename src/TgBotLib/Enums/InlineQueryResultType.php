<?php

    namespace TgBotLib\Enums;

    final class InlineQueryResultType
    {
        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
         */
        public const ARTICLE = 'article';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
         */
        public const PHOTO = 'photo';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultgif
         */
        public const GIF = 'gif';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
         */
        public const MPEG_4_GIF = 'mpeg4_gif';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvideompeg4
         */
        public const VIDEO = 'video';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultaudio
         */
        public const AUDIO = 'audio';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvoice
         */
        public const VOICE = 'voice';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultdocument
         */
        public const DOCUMENT = 'document';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
         */
        public const LOCATION = 'location';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvenue
         */
        public const VENUE = 'venue';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultcontact
         */
        public const CONTACT = 'contact';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultgame
         */
        public const GAME = 'game';

        public const ALL = [
            self::ARTICLE,
            self::PHOTO,
            self::GIF,
            self::MPEG_4_GIF,
            self::VIDEO,
            self::AUDIO,
            self::VOICE,
            self::DOCUMENT,
            self::LOCATION,
            self::VENUE,
            self::CONTACT,
            self::GAME,
        ];
    }