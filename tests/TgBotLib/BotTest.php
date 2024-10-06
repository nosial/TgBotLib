<?php

namespace TgBotLib;

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
    public function testSendRequestValid(): void
    {
        $method = 'getMe';
        $parameters = ['text' => 'test message'];

        // assuming that sendMessage method is properly working
        $result = $this->bot->sendRequest($method, $parameters);

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