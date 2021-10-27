<?php

namespace BrainGames\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $questionText = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];

    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $question = rand(1, 100);
        $answer = correctAnswer($question);

        $questions[] = [
            'question' => $question,
            'correctAnswer' => $answer
        ];
    }

    runGame($questionText, $questions);
}

function correctAnswer($number): string
{
    $result = $number % 2;
    if ($result > 0) {
        return 'no';
    } else {
        return 'yes';
    }
}
