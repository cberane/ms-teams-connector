<?php


namespace Cberane\MsTeamsConnector\Tests\Inputs;


use Cberane\MsTeamsConnector\Inputs\TextInput;
use PHPUnit\Framework\TestCase;

class TextInputTest extends TestCase
{

    /**
     * @test
     */
    public function empty_input()
    {
        $input = new TextInput();

        self::assertEquals('{"@type":"TextInput","isMultiline":false}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_multiline()
    {
        $input = new TextInput(true);

        self::assertEquals('{"@type":"TextInput","isMultiline":true}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_id()
    {
        $input = new TextInput(false, 'myID');

        self::assertEquals('{"@type":"TextInput","id":"myID","isMultiline":false}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_title()
    {
        $input = new TextInput(false, null, 'myTitle');

        self::assertEquals('{"@type":"TextInput","title":"myTitle","isMultiline":false}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_complete()
    {
        $input = new TextInput(true, 'id1', 'title1');

        self::assertEquals('{"@type":"TextInput","id":"id1","title":"title1","isMultiline":true}', $input->toJson());
    }
}