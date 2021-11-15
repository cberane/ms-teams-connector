<?php


namespace Cberane\MsTeamsConnector\Cards;


abstract class AbstractCard
{
    /**
     * returns the array representation of this card
     *
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * returns the card as json string (webhook payload)
     *
     * @return string json representation of the card
     */
    public function toJson(): string{
        return json_encode($this->toArray());
    }
}