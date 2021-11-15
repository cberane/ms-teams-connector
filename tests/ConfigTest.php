<?php

namespace Cberane\MsTeamsConnector\Tests;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * @var string
     */
    private string $endpoint;

    protected function setUp(): void
    {
        parent::setUp();

        // load endpoint from env
        $this->endpoint = getenv('ENDPOINT');
    }

    /** @test */
    public function endpoint_can_be_loaded_from_env()
    {
        // would be set to false on loading error
        self::assertNotFalse($this->endpoint);
    }

    /**
     * @test
     */
    public function endpoint_is_set()
    {
        // check that the endpoint has been set correctly
        self::assertIsString($this->endpoint);
        // should be different to placeholder
        self::assertNotEquals('https://tenant.webhook.office.com/webhookb2/your/url', $this->endpoint, 'endpoint has not been set correctly');

    }
}