<?php
    include_once 'Element.php';
    include_once 'RockPaperScissors.php';
    include_once 'Player.php';


    $name = readline('input Your name: ');
    $game = new RockPaperScissors
    (
        new Player($name),
        new Player('Computer')
    );

    echo PHP_EOL;
    while(true) {
        echo 'Chose an element or input 0 to exit: ' . PHP_EOL;
        foreach ($game->getChoices() as $key => $element)
        {
            echo $key + 1 . ' : ' . $element->getName() . PHP_EOL;
        }
        while (true) {
            $input = (int)readline('Your choice: ');
            if ($input > 0 && $input <= count($game->getChoices()))
            {
                break;
            } else if ($input===0)
            {
                echo 'goodBYE' . PHP_EOL;
                exit;
            } else
            {
                echo 'Incorrect element' . PHP_EOL;
            }
        }
        echo PHP_EOL;
        $game->getPlayer1()->setElement($game->getChoices()[$input - 1]);
        $game->getPlayer2()->setElement($game->getChoices()[array_rand($game->getChoices())]);
        echo $game->getPlayer1()->getName() . ' choice: ' . $game->getPlayer1()->getElement()->getName() . PHP_EOL;
        echo $game->getPlayer2()->getName() . ' choice: ' . $game->getPlayer2()->getElement()->getName() . PHP_EOL;
        echo PHP_EOL;
        echo $game->getResult() . PHP_EOL;
        echo PHP_EOL . PHP_EOL;
    }



