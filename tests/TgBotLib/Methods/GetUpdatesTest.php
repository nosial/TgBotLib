<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Objects\Update;

class GetUpdatesTest extends TestCase
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
     * Tests the `sendMessage` function of the bot instance.
     *
     * @return void
     */
    public function testGetUpdatesTest(): void
    {
        $result = self::$bot->getUpdates();

        if(count($result) > 0)
        {
            $this->assertInstanceOf(Update::class, $result[0]);
        }

        $this->assertIsArray($result);
    }
}
