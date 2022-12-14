<?php
class RockPaperScissors{
    private ?Player $player1, $player2;
    private ?array $choices;

    public function __construct(?array $choices, ?Player $player1 = null, ?Player $player2 = null)
    {

        $this->choices = $choices;
        $this->player1 = $player1;
        $this->player2 = $player2;

    }


    public function getPlayer1(): ?Player
    {
        return $this->player1;
    }

    public function getPlayer2(): ?Player
    {
        return $this->player2;
    }

    public function setPlayer1(?Player $player1): void
    {
        $this->player1 = $player1;
    }

    public function setPlayer2(?Player $player2): void
    {
        $this->player2 = $player2;
    }

    public function getChoices(): ?array
    {
        return $this->choices;
    }

    public function setChoices(?array $choices) : void
    {
        $this->choices = $choices;
    }

    public function getResult(): string{
        if($this->choices === null){
            return 'Choices not set';
        }
        if($this->getPlayer1() === null || $this->getPlayer2() === null)
        {
            return 'Not enough players';
        }
        if($this->player1->getElement() !== null && $this->player2->getElement() !== null)
        {
            if (in_array($this->player2->getElement(), $this->player1->getElement()->getCanWin(), true)) {
                return ($this->player1 . ' wins! ' . $this->player1->getElement() . ' beats ' . $this->player2->getElement());
            }
            if ($this->getPlayer1()->getElement()===$this->getPlayer2()->getElement()){
                return ('It is a draw! ' . $this->player2->getElement(). ' is equal to ' . $this->player1->getElement());
            }
            return ($this->player2 . ' wins! ' . $this->player2->getElement() . ' beats ' . $this->player1->getElement());
        }
        return('Players elements not set');
    }


}