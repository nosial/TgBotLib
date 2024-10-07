<?php

namespace TgBotLib;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class BotTest extends TestCase
{
    private $bot;
    protected function setUp(): void
    {
        $this->bot = new Bot(BOT_TOKEN);
    }

    /**
     * Test sendRequest method of Bot class
     * for valid method and parameters.
     */
    public function getMeTest(): void
    {
        $result = $this->bot->getMe();
        $this->assertIsArray($result);
    }

    /**
     * Test sendRequest method of Bot class
     * for invalid method.
     */
    public function testSendRequestInvalidMethod(): void
    {
        $method = 'invalidMethod';
        $parameters = [];

        $this->expectException(InvalidArgumentException::class);

        $this->bot->sendRequest($method, $parameters);
    }
}