<?php

    namespace TgBotLib\Enums;

    enum InputMediaType : string
    {
        case PHOTO = 'photo';
        case VIDEO = 'video';
        case ANIMATION = 'animation';
        case AUDIO = 'audio';
        case DOCUMENT = 'document';
    }