<?php

    namespace TgBotLib\Enums\Types;

    enum RevenueWithdrawalType : string
    {
        case PENDING = 'pending';
        case SUCCEEDED = 'succeed';
        case FAILED = 'failed';
    }
