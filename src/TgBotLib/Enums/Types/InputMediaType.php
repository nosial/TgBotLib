<?php

    namespace TgBotLib\Enums\Types;

    enum InputMediaType : string
    {
        case PHOTO = 'photo';
        case VIDEO = 'video';
        case ANIMATION = 'animation';
        case AUDIO = 'audio';
        case DOCUMENT = 'document';
    }