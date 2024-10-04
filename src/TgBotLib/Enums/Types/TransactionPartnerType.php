<?php

    namespace TgBotLib\Enums\Types;

    enum TransactionPartnerType : string
    {
        case USER = 'user';
        case FRAGMENT = 'fragment';
        case TELEGRAM_ADS = 'telegram_ads';
        case OTHER = 'other';
    }
