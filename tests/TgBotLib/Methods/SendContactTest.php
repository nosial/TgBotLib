<?php

    namespace TgBotLib\Methods;

    use PHPUnit\Framework\TestCase;
    use TgBotLib\Bot;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\Message;

    class SendContactTest extends TestCase
    {
        private static Bot $bot;

        public static function setUpBeforeClass(): void
        {
            // Initialize the Bot instance before tests
            self::$bot = new Bot(BOT_TOKEN);
            self::$bot->setAutoRetry(true);
        }

        /**
         * Tests the sendContact method.
         *
         * @return void
         */
        public function testSendContact(): void
        {

            // Execute the method and retrieve the result
            $result = self::$bot->sendContact(
                chat_id: TEST_CHAT_ID,
                phone_number: '18884074747',
                first_name: 'FBI',
            );

            // Assert that the result is an instance of Message
            $this->assertInstanceOf(Message::class, $result);
        }
    }

