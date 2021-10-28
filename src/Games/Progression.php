<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $description = 'What number is missing in the progression?';
    $questions   = [];
    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $length                  = rand(5, 10);
        $progression             = generateProgression($length);
        $hideIndex               = rand(5, $length - 1);
        $answer                  = (string)$progression[$hideIndex];
        $progression[$hideIndex] = '..';
        $question                = implode(' ', $progression);

        $questions[] = [
            'question'      => $question,
            'correctAnswer' => $answer
        ];
    }
    runGame($description, $questions);
}

function generateProgression($length): array
{
    $progression = [];
    $number      = rand(1, 20);
    $step        = rand(1, 20);
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $number;
        $number       += $step;
    }
    return $progression;
}
