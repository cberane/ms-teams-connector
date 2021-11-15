<?php


namespace Cberane\MsTeamsConnector\Inputs;


class DateInput extends AbstractInput
{

    public function __construct(?string $id = null, ?string $title = null)
    {
        parent::__construct($id, $title);
    }

    public function getType(): string
    {
        return 'DateInput';
    }

    protected function fillArray(array $arr): array
    {
        // nothing to add - no custom fields (yet)

        return $arr;
    }
}