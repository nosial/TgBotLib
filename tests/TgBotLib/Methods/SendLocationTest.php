<?php

namespace TgBotLib\Methods;

use PHPUnit\Framework\TestCase;
use TgBotLib\Bot;
use TgBotLib\Exceptions\TelegramException;
use TgBotLib\Objects\Message;

class SendLocationTest extends TestCase
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
     * Tests the basic `sendLocation` functionality
     *
     * @return void
     */
    public function testSendLocation(): void
    {
        $result = self::$bot->sendLocation(
            chat_id: TEST_CHAT_ID,
            latitude: 51.5074,
            longitude: -0.1278
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getLocation());
        $this->assertEquals(51.507394, $result->getLocation()->getLatitude());
        $this->assertEquals(-0.127813, $result->getLocation()->getLongitude());
    }

    /**
     * Tests sending a live location
     *
     * @return void
     */
    public function testSendLiveLocation(): void
    {
        $result = self::$bot->sendLocation(
            chat_id: TEST_CHAT_ID,
            latitude: 51.5074,
            longitude: -0.1278,
            live_period: 60,
            heading: 90,
            proximity_alert_radius: 100
        );

        $this->assertInstanceOf(Message::class, $result);
        $this->assertNotNull($result->getLocation());
        $this->assertTrue($result->getLocation()->getLivePeriod() > 0);
    }

    /**
     * Tests sending location with invalid latitude
     *
     * @return void
     */
    public function testSendLocationInvalidLatitude(): void
    {
        $this->expectException(TelegramException::class);

        self::$bot->sendLocation(
            chat_id: TEST_CHAT_ID,
            latitude: 'invalid',
            longitude: -0.1278
        );
    }

    /**
     * Tests sending location with invalid heading
     *
     * @return void
     */
    public function testSendLocationInvalidHeading(): void
    {
        $this->expectException(TelegramException::class);

        self::$bot->sendLocation(
            chat_id: TEST_CHAT_ID,
            latitude: 51.5074,
            longitude: -0.1278,
            heading: 361
        );
    }

    /**
     * Tests sending location with invalid proximity alert radius
     *
     * @return void
     */
    public function testSendLocationInvalidProximityAlertRadius(): void
    {
        $this->expectException(TelegramException::class);

        self::$bot->sendLocation(
            chat_id: TEST_CHAT_ID,
            latitude: 51.5074,
            longitude: -0.1278,
            proximity_alert_radius: 100001
        );
    }
}