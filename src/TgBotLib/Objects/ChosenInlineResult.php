<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChosenInlineResult implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $result_id;

        /**
         * @var User
         */
        private $from;

        /**
         * @var Location|null
         */
        private $location;

        /**
         * @var string|null
         */
        private $inline_message_id;

        /**
         * @var string
         */
        private $query;

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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'result_id' => $this->result_id,
                'from' => ($this->from instanceof ObjectTypeInterface) ? $this->from->toArray() : $this->from,
                'location' => ($this->location instanceof ObjectTypeInterface) ? $this->location->toArray() : $this->location,
                'inline_message_id' => $this->inline_message_id,
                'query' => $this->query,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ChosenInlineResult
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->result_id = $data['result_id'] ?? null;
            $object->from = $data['from'] ?? null;
            $object->location = $data['location'] ?? null;
            $object->inline_message_id = $data['inline_message_id'] ?? null;
            $object->query = $data['query'] ?? null;

            return $object;
        }
    }