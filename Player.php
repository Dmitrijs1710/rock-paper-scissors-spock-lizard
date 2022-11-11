<?php

class Player
{
    private string $name;
    private ?Element $element;
    public function __construct(string $name,?Element $element = null)
    {
        $this->name = $name;
        $this->element = $element;
    }

    public function __toString()
    {
        return $this->name;
    }



    public function getElement(): ?Element
    {
        return $this->element;
    }


    public function setElement(?Element $element): void
    {
        $this->element = $element;
    }
}