<?php

    namespace TgBotLib\Enums\Types;

    enum InputMessageContentType : string
    {
        case TEXT = 'text';
        case LOCATION = 'location';
        case VENUE = 'venue';
        case CONTACT = 'contact';
        case INVOICE = 'invoice';
    }
