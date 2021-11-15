<?php


namespace Cberane\MsTeamsConnector\CardContents\PotentialActions;


class HttpPost extends AbstractAction
{

    /**
     * @var string the target where to send the post (from MS Teams)
     */
    private string $target;

    public function __construct(string $name, string $target)
    {
        parent::__construct($name);
        $this->target = $target;
    }

    public function getType(): string
    {
        return 'HttpPOST';
    }

    public function toArray(): array
    {
        $temp = parent::toArray();

        // add target
        $temp['target'] = $this->target;

        return $temp;
    }
}