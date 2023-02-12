<?php

    namespace TgBotLib\Abstracts;

    abstract class MessageEntityType
    {
        const Mention = 'mention';

        const Hashtag = 'hashtag';

        const CashTag = 'cashtag';

        const BotCommand = 'bot_command';

        const Url = 'url';

        const Email = 'email';

        const PhoneNumber = 'phone_number';

        const Bold = 'bold';

        const Italic = 'italic';

        const Underline = 'underline';

        const Strikethrough = 'strikethrough';

        const Spoiler = 'spoiler';

        const Code = 'code';

        const Pre = 'pre';

        const TextLink = 'text_link';

        const TextMention = 'text_mention';

        const CustomEmoji = 'custom_emoji';

    }