<?php


namespace Cberane\MsTeamsConnector\CardContents;


class Section
{
    private ?string $activityTitle;
    private ?string $activitySubtitle;
    private ?string $activityImage;

    /**
     * @var array|Fact[]
     */
    private array $facts = [];
    private bool $markdown;

    public function __construct(?string $activityTitle = null, ?string $activitySubtitle = null, ?string $activityImage = null, bool $markdown = false)
    {
        $this->activityTitle = $activityTitle;
        $this->activitySubtitle = $activitySubtitle;
        $this->activityImage = $activityImage;
        $this->markdown = $markdown;
    }

    public function toArray(): array
    {
        $temp = [
            'markdown' => $this->markdown
        ];

        if ($this->activityTitle){
            $temp['activityTitle'] = $this->activityTitle;
        }
        if ($this->activitySubtitle){
            $temp['activitySubtitle'] = $this->activitySubtitle;
        }
        if ($this->activityImage){
            $temp['activityImage'] = $this->activityImage;
        }

        $facts = [];
        foreach ($this->facts as $fact){
            $facts[] = $fact->toArray();
        }
        $temp['facts'] = $facts;

        return $temp;
    }

    public function addFact(Fact $fact):self
    {
        $this->facts[] = $fact;

        return $this;
    }
}