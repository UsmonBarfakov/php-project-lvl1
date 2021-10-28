<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $questionText = 'Answer "yes" if given number is prime. Otherwise answer "on".';
    $questions    = [];

    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $num = rand(1, 100);
        $answer = isNumberPrime($num) ? 'yes' : 'no';

        $questions[] = [
            'question' => $num,
            'correctAnswer' => $answer
        ];
    }
    runGame($questionText, $questions);
}

function isNumberPrime($num): bool
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
