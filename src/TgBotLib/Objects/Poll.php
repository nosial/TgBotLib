<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Poll implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $id;

        /**
         * @var string
         */
        private $question;

        /**
         * @var PollOption[]
         */
        private $options;

        /**
         * @var int
         */
        private $total_voter_count;

        /**
         * @var bool
         */
        private $is_closed;

        /**
         * @var bool
         */
        private $is_anonymous;

        /**
         * @var string
         */
        private $type;

        /**
         * @var bool
         */
        private $allow_multiple_answers;

        /**
         * @var int|null
         */
        private $correct_option_id;

        /**
         * @var string
         */
        private $explanation;

        /**
         * @var MessageEntity[]|null
         */
        private $explanation_entities;

        /**
         * @var int|null
         */
        private $open_period;

        /**
         * @var int|null
         */
        private $close_date;

        /**
         * Unique poll identifier
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Poll question, 1-300 characters
         *
         * @return string
         */
        public function getQuestion(): string
        {
            return $this->question;
        }

        /**
         * List of poll options
         *
         * @return PollOption[]
         */
        public function getOptions(): array
        {
            return $this->options;
        }

        /**
         * Total number of users that voted in the poll
         *
         * @return int
         */
        public function getTotalVoterCount(): int
        {
            return $this->total_voter_count;
        }

        /**
         * True, if the poll is closed
         *
         * @return bool
         */
        public function isClosed(): bool
        {
            return $this->is_closed;
        }

        /**
         * True, if the poll is anonymous
         *
         * @return bool
         */
        public function isAnonymous(): bool
        {
            return $this->is_anonymous;
        }

        /**
         * Poll type, currently can be “regular” or “quiz”
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * True, if the poll allows multiple answers
         *
         * @return bool
         */
        public function isAllowMultipleAnswers(): bool
        {
            return $this->allow_multiple_answers;
        }

        /**
         * Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which
         * are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
         *
         * @return int|null
         */
        public function getCorrectOptionId(): ?int
        {
            return $this->correct_option_id;
        }

        /**
         * Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in
         * a quiz-style poll, 0-200 characters
         *
         * @return string
         */
        public function getExplanation(): string
        {
            return $this->explanation;
        }

        /**
         * Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
         *
         * @return MessageEntity[]|null
         */
        public function getExplanationEntities(): ?array
        {
            return $this->explanation_entities;
        }

        /**
         * Optional. Amount of time in seconds the poll will be active after creation
         *
         * @return int|null
         */
        public function getOpenPeriod(): ?int
        {
            return $this->open_period;
        }

        /**
         * Optional. Point in time (Unix timestamp) when the poll will be automatically closed
         *
         * @return int|null
         */
        public function getCloseDate(): ?int
        {
            return $this->close_date;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            $options = null;
            foreach($this->options as $option)
            {
                $options[] = $option->toArray();
            }

            return [
                'id' => $this->id ?? null,
                'question' => $this->question ?? null,
                'options' => $options ?? null,
                'total_voter_count' => $this->total_voter_count ?? null,
                'is_closed' => $this->is_closed ?? null,
                'is_anonymous' => $this->is_anonymous ?? null,
                'type' => $this->type ?? null,
                'allow_multiple_answers' => $this->allow_multiple_answers ?? null,
                'correct_option_id' => $this->correct_option_id ?? null,
                'explanation' => $this->explanation ?? null,
                'explanation_entities' => $this->explanation_entities ?? null,
                'open_period' => $this->open_period ?? null,
                'close_date' => $this->close_date ?? null,
            ];
        }

        /**
         * Constructs object from array representation
         *
         * @param array $data
         * @return Poll
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->id = $data['id'] ?? null;
            $object->question = $data['question'] ?? null;
            $object->total_voter_count = $data['total_voter_count'] ?? null;
            $object->is_closed = $data['is_closed'] ?? null;
            $object->is_anonymous = $data['is_anonymous'] ?? null;
            $object->type = $data['type'] ?? null;
            $object->allow_multiple_answers = $data['allow_multiple_answers'] ?? null;
            $object->correct_option_id = $data['correct_option_id'] ?? null;
            $object->explanation = $data['explanation'] ?? null;
            $object->open_period = $data['open_period'] ?? null;
            $object->close_date = $data['close_date'] ?? null;

            $object->explanation_entities = null;
            if(isset($data['explanation_entities']) && is_array($data['explanation_entities']))
            {
                $object->explanation_entities = [];
                foreach($data['explanation_entities'] as $explanation_entity)
                {
                    $object->explanation_entities[] = MessageEntity::fromArray($explanation_entity);
                }
            }

            $object->options = null;
            if(isset($data['options']) && is_array($data['options']))
            {
                $object->options = [];
                foreach($data['options'] as $option)
                {
                    $object->options[] = PollOption::fromArray($option);
                }
            }

            return $object;
        }
    }