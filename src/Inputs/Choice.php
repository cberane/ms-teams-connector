<?php


namespace Cberane\MsTeamsConnector\Inputs;


class Choice
{
    private string $display;
    private string $value;

    public function __construct(string $display, string $value)
    {
        $this->display = $display;
        $this->value = $value;
    }

    public function toArray(): array
    {
        return [
            'display' => $this->display,
            'value' => $this->value
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}