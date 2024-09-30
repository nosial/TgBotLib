<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Objects\Telegram\User;

class GetMeTest extends TestCase
{
    private $bot;

    protected function setUp(): void
    {
        $this->bot = new Bot(BOT_TOKEN);
    }

    /**
     * This test checks if the `execute` method of the `getMe` class correctly calls `fromArray` method of User class
     * and `executeCurl` method of the `getMe` class (itself), with correctly built parameters.
     *
     * Method `execute` should return User object constructed from the array returned by `executeCurl`.
     */
    public function testExecute()
    {
        $user = getMe::execute($this->bot);
        $this->assertInstanceOf(User::class, $user);
    }
}