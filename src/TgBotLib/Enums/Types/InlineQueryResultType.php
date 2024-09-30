<?php

    namespace TgBotLib\Enums\Types;

    enum InlineQueryResultType : string
    {
        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
         */
        case ARTICLE = 'article';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
         */
        case PHOTO = 'photo';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultgif
         */
        case GIF = 'gif';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
         */
        case MPEG_4_GIF = 'mpeg4_gif';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvideompeg4
         */
        case VIDEO = 'video';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultaudio
         */
        case AUDIO = 'audio';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvoice
         */
        case VOICE = 'voice';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultdocument
         */
        case DOCUMENT = 'document';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
         */
        case LOCATION = 'location';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultvenue
         */
        case VENUE = 'venue';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultcontact
         */
        case CONTACT = 'contact';

        /**
         * @link https://core.telegram.org/bots/api#inlinequeryresultgame
         */
        case GAME = 'game';
    }