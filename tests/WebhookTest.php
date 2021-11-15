<?php

namespace Cberane\MsTeamsConnector\Tests;

use Cberane\MsTeamsConnector\Cards\TextCard;
use Cberane\MsTeamsConnector\TeamsConnector;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

/**
 * Class WebhookTest
 *
 * @package Cberane\MsTeamsIncomingWebhooks\Tests
 */
class WebhookTest extends TestCase
{

    /**
     * the client to use for the api calls
     *
     * @var Client
     */
    private Client $client;

    /**
     * @var string
     */
    private $endpoint;

    private TeamsConnector $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new Client();
        $this->endpoint = getenv('ENDPOINT');
        $this->handler = new TeamsConnector($this->endpoint, $this->client);
    }

    /**
     * basic test to push a simple 'hello world' example message
     *
     * @test
     * @throws GuzzleException
     */
    public function send_hello_world()
    {
        // Example from technet: https://docs.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/connectors-using?tabs=cURL#send-messages-using-curl-and-powershell
        // curl -H 'Content-Type: application/json' -d '{"text": "Hello World"}' <YOUR WEBHOOK URL>

        $response = $this->client->post($this->endpoint, [
            'body' => '{"text": "Hello World (from package test)"}'
        ]);

        self::assertEquals(200, $response->getStatusCode());
    }

    /**
     * basic test to push a simple 'hello world' example message through the handler
     *
     * @test
     * @throws GuzzleException
     */
    public function send_hello_world_through_handler()
    {
        $response = $this->handler->sendCustomBody('{"text": "Hello World (from handler)"}');

        self::assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function send_text_card()
    {
        $response = $this->handler->sendCard(new TextCard('Hello World (from TextCard)'));

        self::assertEquals(200, $response->getStatusCode());
    }
}