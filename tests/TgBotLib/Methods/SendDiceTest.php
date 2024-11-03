<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Objects\Message;

class SendDiceTest extends TestCase
{
    private static Bot $bot;

    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::$bot = new Bot(BOT_TOKEN);
        self::$bot->setAutoRetry(true);
    }

    /**
     * Tests the basic `sendVenue` functionality
     *
     * @return void
     */
    public function testSendDice(): void
    {
        $result = self::$bot->sendDice(
            chat_id: TEST_CHAT_ID,
            emoji: '🎲'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getDice());
        $this->assertEquals('🎲', $result->getDice()->getEmoji());
    }

    public function testSendTargetTest(): void
    {
        $result = self::$bot->sendDice(
            chat_id: TEST_CHAT_ID,
            emoji: '🎯'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getDice());
        $this->assertEquals('🎯', $result->getDice()->getEmoji());
    }

    public function testSendBasketballTest(): void
    {
        $result = self::$bot->sendDice(
            chat_id: TEST_CHAT_ID,
            emoji: '🏀'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getDice());
        $this->assertEquals('🏀', $result->getDice()->getEmoji());
    }

    public function testSendCousinsBowlingTest(): void
    {
        $result = self::$bot->sendDice(
            chat_id: TEST_CHAT_ID,
            emoji: '🎳'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getDice());
        $this->assertEquals('🎳', $result->getDice()->getEmoji());
    }

    public function testSendSoccerTest(): void
    {
        $result = self::$bot->sendDice(
            chat_id: TEST_CHAT_ID,
            emoji: '⚽'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getDice());
        $this->assertEquals('⚽', $result->getDice()->getEmoji());
    }

    public function testSlotMachineTest(): void
    {
        $result = self::$bot->sendDice(
            chat_id: TEST_CHAT_ID,
            emoji: '🎰'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getDice());
        $this->assertEquals('🎰', $result->getDice()->getEmoji());
    }
}