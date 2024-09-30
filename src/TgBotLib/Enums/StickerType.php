<?php

    namespace TgBotLib\Enums;

    enum StickerType : string
    {
        case REGULAR = 'regular';

        case MASK = 'mask';

        case CUSTOM_EMOJI = 'custom_emoji';
    }