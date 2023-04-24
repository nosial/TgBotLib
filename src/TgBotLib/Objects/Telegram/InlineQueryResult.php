<?php

    namespace TgBotLib\Objects\Telegram;

    use InvalidArgumentException;
    use TgBotLib\Abstracts\InlineQueryResultType;
    use TgBotLib\Exceptions\NotImplementedException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultArticle;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultAudio;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultContact;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultDocument;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultGame;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultGif;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultLocation;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultMpeg4Gif;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultPhoto;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVenue;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVideo;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVoice;

    class InlineQueryResult implements ObjectTypeInterface
    {

        /**
         * Returns an array representation of the object
         *
         * @return array
         * @throws NotImplementedException
         * @deprecated Don't use, use fromArray() instead directly to construct the appropriate child class
         */
        public function toArray(): array
        {
            throw new NotImplementedException(sprintf('This object is abstract, you can\'t use it directly, try constructing one of the child classes with fromArray()'));
        }

        /**
         * Returns an object constructed from the given array
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            if(!isset($data['type']))
            {
                throw new InvalidArgumentException('The type of the InlineQueryResult is not set, this is required!');
            }

            switch(strtolower($data['type']))
            {
                case InlineQueryResultType::Article:
                    return InlineQueryResultArticle::fromArray($data);
                case InlineQueryResultType::Photo:
                    return InlineQueryResultPhoto::fromArray($data);
                case InlineQueryResultType::Gif:
                    return InlineQueryResultGif::fromArray($data);
                case InlineQueryResultType::Mpeg4Gif:
                    return InlineQueryResultMpeg4Gif::fromArray($data);
                case InlineQueryResultType::Video:
                    return InlineQueryResultVideo::fromArray($data);
                case InlineQueryResultType::Audio:
                    return InlineQueryResultAudio::fromArray($data);
                case InlineQueryResultType::Voice:
                    return InlineQueryResultVoice::fromArray($data);
                case InlineQueryResultType::Document:
                    return InlineQueryResultDocument::fromArray($data);
                case InlineQueryResultType::Location:
                    return InlineQueryResultLocation::fromArray($data);
                case InlineQueryResultType::Venue:
                    return InlineQueryResultVenue::fromArray($data);
                case InlineQueryResultType::Contact:
                    return InlineQueryResultContact::fromArray($data);
                case InlineQueryResultType::Game:
                    return InlineQueryResultGame::fromArray($data);
                default:
                    throw new InvalidArgumentException(sprintf('The type of the InlineQueryResult is invalid, got "%s", expected one of "%s"', $data['type'], implode('", "', InlineQueryResultType::All)));
            }
        }
    }