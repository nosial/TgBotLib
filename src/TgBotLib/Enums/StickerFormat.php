<?php

    namespace TgBotLib\Enums;

    enum StickerFormat : string
    {
        case STATIC = 'static';
        case ANIMATED = 'animated';
        case VIDEO = 'video';
    }