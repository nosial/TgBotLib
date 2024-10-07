<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Objects\User;

class GetMeTest extends TestCase
{
    const int TEST_CHAT_ID = -1001301191379;
    private static Bot $bot;

    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::$bot = new Bot(BOT_TOKEN);
    }

    /**
     * Tests the `getMe` function of the bot instance.
     *
     * @return void
     */
    public function testGetMe(): void
    {
        $result = self::$bot->getMe();

        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals(7591266486, $result->getId());
        $this->assertEquals('Debug Bot', $result->getFirstName());
        $this->assertNull($result->getLastName());
        $this->assertEquals('PublicDebuggingBot', $result->getUsername());
        $this->assertTrue($result->isBot());
    }
}