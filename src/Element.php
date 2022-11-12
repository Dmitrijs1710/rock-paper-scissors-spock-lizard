<?php
class Element{
    private string $name;
    private array $canWin;
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


    public function getCanWin(): array
    {
        return $this->canWin;
    }

}