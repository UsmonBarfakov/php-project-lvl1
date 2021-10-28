<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $discription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questions   = [];

    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $number = rand(1, 100);
        $answer = isNumberPrime($number) ? 'yes' : 'no';

        $questions[] = [
            'question'      => $number,
            'correctAnswer' => $answer
        ];
    }
    runGame($discription, $questions);
}

function isNumberPrime($number): bool
{
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
