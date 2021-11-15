<?php


namespace Cberane\MsTeamsConnector\Tests\Inputs;


use Cberane\MsTeamsConnector\Inputs\Choice;
use Cberane\MsTeamsConnector\Inputs\MultichoiceInput;
use PHPUnit\Framework\TestCase;

class MultichoiceInputTest extends TestCase
{

    /**
     * @test
     */
    public function empty_input()
    {
        $input = new MultichoiceInput();

        self::assertEquals('{"@type":"MultichoiceInput","isMultiselect":false,"choices":[]}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_id()
    {
        $input = new MultichoiceInput(true,'myID');

        self::assertEquals('{"@type":"MultichoiceInput","id":"myID","isMultiselect":true,"choices":[]}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_title()
    {
        $input = new MultichoiceInput(false, null,'myTitle');

        self::assertEquals('{"@type":"MultichoiceInput","title":"myTitle","isMultiselect":false,"choices":[]}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_complete()
    {
        $input = new MultichoiceInput(true, 'id1', 'title1');

        self::assertEquals('{"@type":"MultichoiceInput","id":"id1","title":"title1","isMultiselect":true,"choices":[]}', $input->toJson());
    }

    /**
     * @test
     */
    public function test_choices()
    {
        $choice = new Choice('my display text', '4711');

        self::assertEquals('{"display":"my display text","value":"4711"}', $choice->toJson());
    }

    /**
     * @test
     */
    public function add_one_choice()
    {
        $input = new MultichoiceInput();
        $input->addChoice(new Choice('Test', '1'));

        self::assertEquals('{"@type":"MultichoiceInput","isMultiselect":false,"choices":[{"display":"Test","value":"1"}]}', $input->toJson());
    }

    /**
     * @test
     */
    public function add_multiple_choices()
    {
        $input = new MultichoiceInput();
        $input->addChoice(new Choice('Test', '1'));
        $input->addChoice(new Choice('Test2', '2'));

        self::assertEquals('{"@type":"MultichoiceInput","isMultiselect":false,"choices":[{"display":"Test","value":"1"},{"display":"Test2","value":"2"}]}', $input->toJson());
    }
}