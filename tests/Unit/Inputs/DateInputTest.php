<?php


namespace Cberane\MsTeamsConnector\Tests\Unit\Inputs;


use Cberane\MsTeamsConnector\Inputs\DateInput;
use PHPUnit\Framework\TestCase;

class DateInputTest extends TestCase
{

    /**
     * @test
     */
    public function empty_input()
    {
        $input = new DateInput();

        self::assertEquals('{"@type":"DateInput"}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_id()
    {
        $input = new DateInput('myID');

        self::assertEquals('{"@type":"DateInput","id":"myID"}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_title()
    {
        $input = new DateInput(null, 'myTitle');

        self::assertEquals('{"@type":"DateInput","title":"myTitle"}', $input->toJson());
    }

    /**
     * @test
     */
    public function set_complete()
    {
        $input = new DateInput('id1', 'title1');

        self::assertEquals('{"@type":"DateInput","id":"id1","title":"title1"}', $input->toJson());
    }
}
