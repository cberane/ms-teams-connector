<?php


namespace Cberane\MsTeamsConnector\Tests;


use Cberane\MsTeamsConnector\Cards\TextCard;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{

    /**
     * @test
     */
    public function text_cards()
    {
        $card = new TextCard('simple test');

        $this->assertEquals('{"text":"simple test"}', $card->toJson());
    }
}