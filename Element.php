<?php
class Element{
    private string $name;
    private array $canWin;
    private array $loseTo;
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }


    public function addWin(Element $element) :void
    {
        $this->canWin[] = $element;
    }
    public function addLose(Element $element) :void
    {
        $this->loseTo[] = $element;
    }

    public function getCanWin(): array
    {
        return $this->canWin;
    }

    public function getLoseTo(): array
    {
        return $this->loseTo;
    }
}