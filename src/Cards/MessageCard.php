<?php


namespace Cberane\MsTeamsConnector\Cards;


use Cberane\MsTeamsConnector\CardContents\Section;
use Cberane\MsTeamsConnector\CardContents\PotentialActions\AbstractAction;
use Cberane\MsTeamsConnector\CardContents\PotentialActions\HttpPost;
use RuntimeException;

class MessageCard extends AbstractCard
{
    /**
     * Theme color
     * @var null|string
     */
    private ?string $themeColor;

    /**
     * Summary
     * @var string|null
     */
    private ?string $summary;

    private ?string $title;

    private ?string $text;

    /**
     * Sections
     * @var array|Section[]
     */
    private array $sections = [];

    /**
     * Action Buttons
     * @var array|AbstractAction[]
     */
    private array $potentialAction = [];


    public function toArray(): array
    {
        $message = [
            "@type" => "MessageCard",
            "@context" => "http://schema.org/extensions",
        ];
        if (isset($this->themeColor)) {
            $message['themeColor'] = $this->themeColor;
        }
        if (isset($this->summary)) {
            $message['summary'] = $this->summary;
        }
        if (isset($this->title)) {
            $message['title'] = $this->title;
        }
        if (isset($this->text)) {
            $message['text'] = $this->text;
        }
        if (sizeof($this->sections) > 0) {
            $sections = [];
            foreach ($this->sections as $section) {
                $sections[] = $section->toArray();
            }
            $message['sections'] = $sections;
        }
        if (sizeof($this->potentialAction) > 0) {
            $actions = [];
            foreach ($this->potentialAction as $action) {
                $actions[] = $action->toArray();
            }
            $message['potentialAction'] = $actions;
        }
        return $message;
    }

    /**
     * Sets Card Color
     * @param string $color
     * @return MessageCard
     */
    public function setThemeColor(string $color): self
    {
        $this->themeColor = $color;
        return $this;
    }

    /**
     * Sets Card Summary
     * @param string $summary
     * @return MessageCard
     */
    public function setSummary(string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): self
    {
        $this->text = $text;

        return $this;
    }

    public function addSection(Section $section): self
    {
        $this->sections[] = $section;

        return $this;
    }

    public function addAction(AbstractAction $action): self
    {
        if ($action instanceof HttpPost) {
            throw new RuntimeException('HttpPOST is only allowed in ActionCards');
        }

        $this->potentialAction[] = $action;

        return $this;
    }
}