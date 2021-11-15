<?php


namespace Cberane\MsTeamsConnector\CardContents\PotentialActions;


abstract class AbstractAction
{

    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function getType();

    public function toArray(): array
    {
        return [
            '@type' => $this->getType(),
            'name' => $this->name,
        ];
    }
}