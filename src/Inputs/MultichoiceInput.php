<?php


namespace Cberane\MsTeamsConnector\Inputs;


class MultichoiceInput extends AbstractInput
{

    /**
     * @var bool
     */
    private bool $isMultiselect;

    /**
     * the choices of the input
     *
     * @var array|Choice[]
     */
    private array $choices = [];

    public function __construct(bool $isMultiselect = false, ?string $id = null, ?string $title = null)
    {
        parent::__construct($id, $title);

        $this->isMultiselect = $isMultiselect;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return 'MultichoiceInput';
    }

    /**
     * @inheritDoc
     */
    protected function fillArray(array $arr): array
    {
        $arr['isMultiselect'] = $this->isMultiselect;

        $choices = [];
        foreach ($this->choices as $choice){
            $choices[] = $choice->toArray();
        }
        $arr['choices'] = $choices;

        return $arr;
    }

    /**
     * @param bool $isMultiselect
     */
    public function setIsMultiselect(bool $isMultiselect): void
    {
        $this->isMultiselect = $isMultiselect;
    }

    public function addChoice(Choice $choice)
    {
        $this->choices[] = $choice;
    }
}