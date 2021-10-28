<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $description = 'Find the greatest common divisor of given numbers.';
    $questions   = [];

    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $number   = rand(1, 50);
        $number2  = rand(1, 100);
        $question = "{$number} {$number2}";
        $answer   = (string)getGcd($number, $number2);
        $questions[] = [
            'question'      => $question,
            'correctAnswer' => $answer
        ];
    }

    runGame($description, $questions);
}

function getGcd($a, $b): int
{
    while ($a != 0 && $b != 0) {
        if ($a > $b) {
            $a = $a % $b;
        } else {
            $b = $b % $a;
        }
    }
    return $a + $b;
}
