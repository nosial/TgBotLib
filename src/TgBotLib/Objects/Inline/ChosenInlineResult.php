<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Location;
    use TgBotLib\Objects\User;

    class ChosenInlineResult implements ObjectTypeInterface
    {
        private string $result_id;
        private User $from;
        private ?Location $location;
        private ?string $inline_message_id;
        private string $query;

        /**
         * The unique identifier for the result that was chosen
         *
         * @return string
         */
        public function getResultId(): string
        {
            return $this->result_id;
        }

        /**
         * The user that chose the result
         *
         * @return User
         */
        public function getFrom(): User
        {
            return $this->from;
        }

        /**
         * Optional. Sender location, only for bots that require user location
         *
         * @return Location|null
         */
        public function getLocation(): ?Location
        {
            return $this->location;
        }

        /**
         * Optional. Identifier of the scent inline message. Available only if there is an inline keyboard attached to
         * the message. Will be also received in callback queries and can be used to edit the message.
         *
         * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
         * @see https://core.telegram.org/bots/api#callbackquery
         * @see https://core.telegram.org/bots/api#updating-messages
         * @return string|null
         */
        public function getInlineMessageId(): ?string
        {
            return $this->inline_message_id;
        }

        /**
         * The query that was used to obtain the result
         *
         * @return string
         */
        public function getQuery(): string
        {
            return $this->query;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'result_id' => $this->result_id,
                'from' => $this->from?->toArray(),
                'location' => $this->location?->toArray(),
                'inline_message_id' => $this->inline_message_id,
                'query' => $this->query,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChosenInlineResult
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->result_id = $data['result_id'] ?? null;
            $object->from = $data['from'] ?? null;
            $object->location = $data['location'] ?? null;
            $object->inline_message_id = $data['inline_message_id'] ?? null;
            $object->query = $data['query'] ?? null;

            return $object;
        }
    }