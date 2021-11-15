<?php


namespace Cberane\MsTeamsConnector\Inputs;


class TextInput extends AbstractInput
{
    private bool $isMultiline;

    public function __construct(bool $isMultiline = false, ?string $id = null, ?string $title= null)
    {
        parent::__construct($id, $title);

        $this->isMultiline = $isMultiline;
    }

    public function getType(): string
    {
        return 'TextInput';
    }

    /**
     * @param array $arr
     * @return array
     */
    protected function fillArray(array $arr): array
    {
        $arr['isMultiline'] = $this->isMultiline;

        return $arr;
    }
}