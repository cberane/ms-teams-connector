<?php


namespace Cberane\MsTeamsConnector\CardContents\PotentialActions;


use Cberane\MsTeamsConnector\Inputs\AbstractInput;

class ActionCard extends AbstractAction
{

    /**
     * array of inputs for this action card
     * @var array|AbstractInput[]
     */
    private array $inputs = [];

    /**
     * @var array|AbstractAction[]
     */
    private array $actions = [];

    public function getType(): string
    {
        return 'ActionCard';
    }

    public function addInput(AbstractInput $input): self
    {
        $this->inputs[] = $input;

        return $this;
    }

    public function addAction(AbstractAction $action): self
    {
        $this->actions[] = $action;

        return $this;
    }

    public function toArray(): array
    {
        $temp = parent::toArray();

        $inputs = [];
        foreach ($this->inputs as $input) {
            $inputs[] = $input->toArray();
        }
        $temp['inputs'] = $inputs;

        $actions = [];
        foreach ($this->actions as $action) {
            $actions[] = $action->toArray();
        }
        $temp['actions'] = $actions;

        return $temp;
    }
}