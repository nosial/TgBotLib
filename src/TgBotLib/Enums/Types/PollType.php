<?php

    namespace TgBotLib\Enums\Types;

    enum PollType : string
    {
        case REGULAR = 'regular';

        case QUIZ = 'quiz';
    }