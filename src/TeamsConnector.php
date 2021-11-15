<?php


namespace Cberane\MsTeamsConnector;


use Cberane\MsTeamsConnector\Cards\AbstractCard;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class TeamsConnector
{
    /**
     * @var string the endpoint where to send the requests
     */
    private string $endpoint;

    /**
     * @var Client the client to use for the requests
     */
    private Client $client;

    /**
     * TeamsWebhookHandler constructor.
     *
     * @param string $endpoint the endpoint where to send the card
     * @param Client|null $client the client to use for the requests
     */
    public function __construct(string $endpoint, Client $client = null)
    {
        $this->endpoint = $endpoint;
        $this->client = $client ?? new Client();
    }

    /**
     * sends the given body to theendpoint
     *
     * **Attention:** you have to create a valid json payload
     * for the webhook to work as expected
     *
     * @param string $body the body to send to the endpoint
     * @return ResponseInterface the endpoints response
     * @throws GuzzleException
     */
    public function sendCustomBody(string $body): ResponseInterface
    {
        return $this->client->post($this->endpoint, [
            'body' => $body,
        ]);
    }

    /**
     * sends the given card to the webhook endpoint
     *
     * @param AbstractCard $card the card to send to ms teams
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendCard(AbstractCard $card): ResponseInterface
    {
        return $this->sendCustomBody($card->toJson());
    }
}