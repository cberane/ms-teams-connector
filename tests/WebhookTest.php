<?php

namespace Cberane\MsTeamsConnector\Tests;

use Cberane\MsTeamsConnector\CardContents\Fact;
use Cberane\MsTeamsConnector\CardContents\Section;
use Cberane\MsTeamsConnector\Cards\MessageCard;
use Cberane\MsTeamsConnector\CardContents\PotentialActions\ActionCard;
use Cberane\MsTeamsConnector\CardContents\PotentialActions\HttpPost;
use Cberane\MsTeamsConnector\CardContents\PotentialActions\OpenUri;
use Cberane\MsTeamsConnector\CardContents\PotentialActions\OpenUriTarget;
use Cberane\MsTeamsConnector\Cards\TextCard;
use Cberane\MsTeamsConnector\Inputs\TextInput;
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
     * @throws GuzzleException
     */
    public function send_text_card()
    {
        $response = $this->handler->sendCard(new TextCard('Hello World (from TextCard)'));

        self::assertEquals(200, $response->getStatusCode());
    }

    /**
     * sending a test card based on the example from [Microsoft TechNet](https://docs.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/connectors-using?tabs=cURL#example-of-connector-message)
     *
     * @test
     * @throws GuzzleException
     * @noinspection SpellCheckingInspection
     */
    public function send_custom_card()
    {
        $card = new MessageCard();
        $card->setThemeColor('0076D7')
            ->setSummary('Larry Bryant created a new task')
            ->setTitle('Title')
            ->setText('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.')
            ->addSection($this->getSection())
            ->addAction($this->getCommentAction())
            ->addAction(
                (new OpenUri('Check Google'))->addTarget(new OpenUriTarget('https://www.google.com'))
            );

        $response = $this->handler->sendCard($card);

        self::assertEquals(200, $response->getStatusCode());
    }

    private function getSection(): Section
    {
        return (new Section(
            'Larry Bryant created a new task',
            'On Project Tango',
            'https://teamsnodesample.azurewebsites.net/static/img/image5.png')
        )->addFact(new Fact('Assigned to', 'Unassigned'))
            ->addFact(new Fact('Due date', '01.12.2021 17:23 GMT+0100 (Europe/Berlin)'))
            ->addFact(new Fact('Status', 'Not started'));
    }

    /**
     * @return ActionCard
     */
    private function getCommentAction(): ActionCard
    {
        return (new ActionCard('Add a comment'))
            ->addInput(new TextInput(false, 'comment', 'Add a comment here for this task'))
            ->addAction(new HttpPost('Add comment', 'https://docs.microsoft.com/outlook/actionable-messages'));
    }
}