<?php

    namespace TgBotLib\Enums\Types;

    enum PassportElementErrorType : string
    {
        case PERSONAL_DETAILS = 'personal_details';
        case PASSPORT = 'passport';
        case DRIVER_LICENSE = 'driver_license';
        case IDENTITY_CARD = 'identity_card';
        case INTERNAL_PASSPORT = 'internal_passport';
        case ADDRESS = 'address';
    }
