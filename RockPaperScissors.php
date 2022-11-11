<?php
class RockPaperScissors{
    private ?Player $player1, $player2;
    private array $choices;


    public function __construct(?Player $player1=null, ?Player $player2=null)
    {
        $combinations =
        [
            [ 1, 0 ],
            [ 2, 1 ],
            [ 0, 2 ],
            [ 0, 4 ],
            [ 4, 3 ],
            [ 3, 2 ],
            [ 2, 4 ],
            [ 4, 1 ],
            [ 1, 3 ],
            [ 3, 0 ]
        ];
        $this->choices = [
                new Element('Rock'),
                new Element('Paper'),
                new Element('Scissors'),
                new Element('Spock'),
                new Element('Lizard')
        ];
        foreach ($this->choices as $key=>$element)
        {
            foreach ($combinations as $combination)
            {
                [$p1,$p2] = $combination;
                if($p1 === $key)
                {
                    $element->addWin($this->choices[$p2]);
                } else if ($p2 === $key){
                    $element->addLose($this->choices[$p1]);
                }
            }
        }
        $this->player1 = $player1;
        $this->player2 = $player2;

    }


    /**
     * @return Player|null
     */
    public function getPlayer1(): ?Player
    {
        return $this->player1;
    }

    /**
     * @return Player|null
     */
    public function getPlayer2(): ?Player
    {
        return $this->player2;
    }

    /**
     * @param Player|null $player1
     */
    public function setPlayer1(?Player $player1): void
    {
        $this->player1 = $player1;
    }

    /**
     * @param Player|null $player2
     */
    public function setPlayer2(?Player $player2): void
    {
        $this->player2 = $player2;
    }

    /**
     * @return array
     */
    public function getChoices(): array
    {
        return $this->choices;
    }

    public function getResult(): string{
        if($this->getPlayer1()===null || $this->getPlayer2()===null){
            return 'Not enough players';
        }
        if($this->player1->getElement() !== null && $this->player2->getElement() !== null)
        {
            if (in_array($this->player2->getElement(), $this->player1->getElement()->getCanWin(), true)) {
                return ($this->player1 . ' wins! ' . $this->player1->getElement() . ' beats ' . $this->player2->getElement());
            }
            if (in_array($this->player2->getElement(), $this->player1->getElement()->getLoseTo(), true)) {
                return ($this->player2 . ' wins! ' . $this->player2->getElement() . ' beats ' . $this->player1->getElement());
            }
            return ('It is a draw! ' . $this->player2->getElement(). ' is equal to ' . $this->player1->getElement());
        }
        return('Players elements not set');
    }


}