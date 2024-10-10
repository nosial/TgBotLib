<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Exceptions\TelegramException;
use TgBotLib\Objects\Message;

class SendVenueTest extends TestCase
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
    public function testSendVenue(): void
    {
        $result = self::$bot->sendVenue(
            chat_id: TEST_CHAT_ID,
            latitude: 51.5074,
            longitude: -0.1278,
            title: 'Big Ben',
            address: 'Westminster, London SW1A 0AA'
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getVenue());
        $this->assertEquals('Big Ben', $result->getVenue()->getTitle());
        $this->assertEquals('Westminster, London SW1A 0AA', $result->getVenue()->getAddress());
        $this->assertEquals(51.507394, $result->getVenue()->getLocation()->getLatitude());
        $this->assertEquals(-0.127813, $result->getVenue()->getLocation()->getLongitude());
    }

    /**
     * Tests sending venue with additional parameters
     *
     * @return void
     */
    public function testSendVenueWithAdditionalParams(): void
    {
        $result = self::$bot->sendVenue(
            chat_id: TEST_CHAT_ID,
            latitude: 51.5074,
            longitude: -0.1278,
            title: 'Big Ben',
            address: 'Westminster, London SW1A 0AA',
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getVenue());
        $this->assertEquals('Big Ben', $result->getVenue()->getTitle());
        $this->assertEquals('Westminster, London SW1A 0AA', $result->getVenue()->getAddress());
    }

    /**
     * Tests sending venue with invalid latitude
     *
     * @return void
     */
    public function testSendVenueInvalidLatitude(): void
    {
        $this->expectException(TelegramException::class);

        self::$bot->sendVenue(
            chat_id: TEST_CHAT_ID,
            latitude: 'invalid',
            longitude: -0.1278,
            title: 'Big Ben',
            address: 'Westminster, London SW1A 0AA'
        );
    }

    /**
     * Tests sending venue with empty address
     *
     * @return void
     */
    public function testSendVenueEmptyAddress(): void
    {
        $this->expectException(TelegramException::class);

        self::$bot->sendVenue(
            chat_id: TEST_CHAT_ID,
            latitude: 51.5074,
            longitude: -0.1278,
            title: 'Big Ben',
            address: ''
        );
    }
}