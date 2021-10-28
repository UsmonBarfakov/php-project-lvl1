<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $questionText = 'What number is missing in the progression?';
    $questions    = [];
    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $length            = rand(5, 10);
        $progr             = generateProgression($length);
        $hideIndex         = rand(5, $length - 1);
        $answer            = (string)$progr[$hideIndex];
        $progr[$hideIndex] = '..';
        $question          = implode(' ', $progr);

        $questions[] = [
            'question'      => $question,
            'correctAnswer' => $answer
        ];
    }
    runGame($questionText, $questions);
}

function generateProgression($length): array
{
    $progression = [];
    $num    = rand(1, 20);
    $step   = rand(1, 20);
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $num;
        $num += $step;
    }
    return $progression;
}
