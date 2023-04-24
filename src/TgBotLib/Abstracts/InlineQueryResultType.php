<?php

    namespace TgBotLib\Abstracts;

    abstract class InlineQueryResultType
    {
        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
         */
        const Article = 'article';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
         */
        const Photo = 'photo';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultgif
         */
        const Gif = 'gif';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
         */
        const Mpeg4Gif = 'mpeg4_gif';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvideompeg4
         */
        const Video = 'video';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultaudio
         */
        const Audio = 'audio';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvoice
         */
        const Voice = 'voice';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultdocument
         */
        const Document = 'document';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
         */
        const Location = 'location';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvenue
         */
        const Venue = 'venue';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultcontact
         */
        const Contact = 'contact';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultgame
         */
        const Game = 'game';

        const All = [
            self::Article,
            self::Photo,
            self::Gif,
            self::Mpeg4Gif,
            self::Video,
            self::Audio,
            self::Voice,
            self::Document,
            self::Location,
            self::Venue,
            self::Contact,
            self::Game,
        ];
    }