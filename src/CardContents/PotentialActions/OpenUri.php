<?php


namespace Cberane\MsTeamsConnector\CardContents\PotentialActions;


class OpenUri extends AbstractAction
{

    /**
     * the targets to add
     * @var array|OpenUriTarget[]
     */
    private array $targets;

    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    /**
     * @param OpenUriTarget $target
     * @return OpenUri
     */
    public function addTarget(OpenUriTarget $target): self
    {
        $this->targets[] = $target;

        return $this;
    }

    public function getType(): string
    {
        return 'OpenUri';
    }

    public function toArray(): array
    {
        $temp = parent::toArray();

        // add targets
        $targets = [];
        foreach ($this->targets as $target) {
            $targets[] = $target->toArray();
        }
        $temp['targets'] = $targets;

        return $temp;
    }
}