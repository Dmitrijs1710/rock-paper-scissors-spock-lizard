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
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Element|null
     */
    public function getElement(): ?Element
    {
        return $this->element;
    }

    /**
     * @param Element|null $element
     */
    public function setElement(?Element $element): void
    {
        $this->element = $element;
    }
}