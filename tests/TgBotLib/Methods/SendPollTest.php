<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Objects\InputPollOption;
use TgBotLib\Objects\Message;

class SendPollTest extends TestCase
{
    private static Bot $bot;

    public static function setUpBeforeClass(): void
    {
        // Initialize the Bot instance before tests
        self::$bot = new Bot(BOT_TOKEN);
        self::$bot->setAutoRetry(true);
    }

    /**
     * Tests the sendPoll method with basic parameters.
     *
     * @return void
     */
    public function testSendPollBasic(): void
    {

        // Execute the method and retrieve the result
        $result = self::$bot->sendPoll(
            chat_id: TEST_CHAT_ID,
            question: 'What is your favorite color?',
            options: [
                (new InputPollOption())->setText('Red'),
                (new InputPollOption())->setText('Blue'),
                (new InputPollOption())->setText('Green'),
            ]
        );

        // Assert that the result is an instance of Message
        $this->assertInstanceOf(Message::class, $result);
    }

    /**
     * Tests the sendPoll method with advanced options.
     *
     * @return void
     */
    public function testSendPollWithAdvancedOptions(): void
    {
        // Execute the method and retrieve the result
        $result = self::$bot->sendPoll(
            chat_id: TEST_CHAT_ID,
            question: 'What is your favorite color?',
            options: [
                (new InputPollOption())->setText('Red'),
                (new InputPollOption())->setText('Blue'),
                (new InputPollOption())->setText('Green'),
            ],
            is_anonymous: false,
            allows_multiple_answers: true,
            correct_option_id: 1,
            explanation: 'The correct answer is Blue.',
            explanation_parse_mode: 'MarkdownV2',
            open_period: 60,
            close_date: strtotime('+1 day')
        );

        // Assert that the result is an instance of Message
        $this->assertInstanceOf(Message::class, $result);
    }

}

