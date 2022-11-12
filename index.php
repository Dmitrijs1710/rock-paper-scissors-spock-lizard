<?php
    include_once './src/Element.php';
    include_once './src/RockPaperScissors.php';
    include_once './src/Player.php';

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
$choices = [
    new Element('Rock'),
    new Element('Paper'),
    new Element('Scissors'),
    new Element('Spock'),
    new Element('Lizard')
];
foreach ($choices as $key=>$element)
{
    foreach ($combinations as $combination)
    {
        [$p1,$p2] = $combination;
        if($p1 === $key)
        {
            $element->addWin($choices[$p2]);
        }
    }
}


$name = readline('input Your name: ');
    $game = new RockPaperScissors
    (
        $choices,
        new Player($name),
        new Player('Computer')
    );

    echo PHP_EOL;
    while(true) {
        echo 'Chose an element or input 0 to exit: ' . PHP_EOL;
        foreach ($game->getChoices() as $key => $element)
        {
            echo $key + 1 . ' : ' . $element . PHP_EOL;
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
        echo $game->getPlayer1() . ' choice: ' . $game->getPlayer1()->getElement() . PHP_EOL;
        echo $game->getPlayer2() . ' choice: ' . $game->getPlayer2()->getElement() . PHP_EOL;
        echo PHP_EOL;
        echo $game->getResult() . PHP_EOL;
        echo PHP_EOL . PHP_EOL;
    }



