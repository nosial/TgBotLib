<?php

    namespace TgBotLib\Objects\Inline;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Exceptions\NotImplementedException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultArticle;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultAudio;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultContact;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultDocument;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultGame;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultGif;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultLocation;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultMpeg4Gif;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultPhoto;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultVenue;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultVideo;
    use TgBotLib\Objects\Inline\InlineQueryResult\InlineQueryResultVoice;

    abstract class InlineQueryResult implements ObjectTypeInterface
    {
        protected InlineQueryResultType $type;
        protected string $id;

        /**
         * Type of the result
         *
         * @return InlineQueryResultType
         */
        public function getType(): InlineQueryResultType
        {
            return $this->type;
        }

        /**
         * Unique identifier for this result, 1-64 Bytes
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Sets the Unique Identifier for this result, must be 1-64 characters
         *
         * @param string $id The ID to set
         * @throws InvalidArgumentException If the size of the ID is empty or over 64 characters long
         * @return $this
         */
        public function setId(string $id): InlineQueryResult
        {
            if(!Validate::length($id, 1, 64))
            {
                throw new InvalidArgumentException(sprintf('id must be between 1 and 64 characters long, got %s characters', $id));
            }

            $this->id = $id;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public abstract function toArray(): array;

        /**
         * @inheritDoc
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            // TODO: Implement this
        }
    }