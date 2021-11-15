<?php


namespace Cberane\MsTeamsConnector\Tests\Unit\Cards;


use Cberane\MsTeamsConnector\CardContents\PotentialActions\HttpPost;
use Cberane\MsTeamsConnector\Cards\MessageCard;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class MessageCardTest extends TestCase
{

    /**
     * @test
     */
    public function add_http_post_to_message_card()
    {
        $this->expectException(RuntimeException::class);

        $card = new MessageCard();
        $card->addAction(new HttpPost('dummy', 'https://www.google.com'));
    }
}
