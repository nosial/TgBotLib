<?php

namespace TgBotLib\Enums\Types;

enum ReactionTypes : string
{
    case EMOJI = 'emoji';
    case CUSTOM_EMOJI = 'custom_emoji';
    case PAID = 'paid';
}
