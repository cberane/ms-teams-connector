<?php


namespace Cberane\MsTeamsConnector\Cards;


class TextCard extends AbstractCard
{
    private string $text;

    /**
     * TextCard constructor.
     *
     * @param string $text the text to send
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function toArray(): array
    {
        return [
            'text' => $this->text
        ];
    }
}