<?php

namespace BrainGames\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions   = [];

    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $number = rand(1, 100);
        $answer = isEven($number) ? 'yes' : 'no';

        $questions[] = [
            'question'      => $number,
            'correctAnswer' => $answer
        ];
    }

    runGame($description, $questions);
}

function isEven($number): bool
{
    return ($number % 2) > 0 ? false : true;
}
