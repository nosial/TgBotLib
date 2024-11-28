<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class GameHighScore implements ObjectTypeInterface
    {
        private int $position;
        private User $user;
        private int $score;

        /**
         * This object represents one row of the high scores table for a game.
         *
         * @param array|null $data
         */
        public function __construct(?array $data=null)
        {
            if($data === null)
            {
                return;
            }

            $this->position = $data['position'];
            $this->user = User::fromArray($data['user']);
            $this->score = $data['score'];
        }

        /**
         * Position in high score table for the game
         *
         * @return int
         */
        public function getPosition(): int
        {
            return $this->position;
        }

        /**
         * User
         *
         * @return User
         */
        public function getUser(): User
        {
            return $this->user;
        }

        /**
         * Score
         *
         * @return int
         */
        public function getScore(): int
        {
            return $this->score;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'position' => $this->position,
                'user' => $this->user->toArray(),
                'score' => $this->score
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?GameHighScore
        {
            return new self($data);
        }
    }