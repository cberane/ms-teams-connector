<?php


namespace Cberane\MsTeamsConnector\Inputs;


abstract class AbstractInput
{
    protected ?string $id;

    protected ?string $title;

    public function __construct(?string $id = null, ?string $title = null)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * returns the action type (@type) required for the teams endpoint
     * @return string
     */
    abstract public function getType(): string;

    /**
     * the array representation of the input to parse to json
     *
     * @return array
     */
    public function toArray(): array
    {
        $temp = [
            '@type' => $this->getType(),
        ];

        // add id and title if needed
        if ($this->id) {
            $temp['id'] = $this->id;
        }
        if ($this->title) {
            $temp['title'] = $this->title;
        }

        // add elements from child classes and return the resulting (complete) array
        return $this->fillArray($temp);
    }

    /**
     * method is called to add all relevant data from child classes
     *
     * @param array $arr to fill
     * @return array
     */
    abstract protected function fillArray(array $arr): array;

    /**
     * parses the input to a json string
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}