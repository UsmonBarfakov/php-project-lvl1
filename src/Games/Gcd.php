<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $questionText = 'Find the greatest common divisor of given numbers.';
    $questions    = [];

    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $num = rand(1, 50);
        $num2 = rand(1, 100);
        $question = "{$num} {$num2}";
        $answer = (string)gcd($num, $num2);
        $questions[] = [
            'question' => $question,
            'correctAnswer' => $answer
        ];
    }
    runGame($questionText, $questions);
}

function gcd($a, $b): int
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
