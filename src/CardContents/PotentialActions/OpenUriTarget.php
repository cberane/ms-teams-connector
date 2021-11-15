<?php


namespace Cberane\MsTeamsConnector\CardContents\PotentialActions;


class OpenUriTarget
{
    private string $uri;
    private string $os;

    public function __construct(string $uri, string $os = "default")
    {
        $this->uri = $uri;
        $this->os = $os;
    }

    public function toArray(): array
    {
        return [
            'os' => $this->os,
            'uri' => $this->uri,
        ];
    }
}