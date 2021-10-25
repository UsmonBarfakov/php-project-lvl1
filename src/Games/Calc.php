<?php
namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;
use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $operations    = ['+', '-', '*'];
    $questionsText = 'What is the result of the expression?';
    $questions     = [];

    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $num       = rand(1, 10);
        $num2      = rand(1, 10);
        $operation = $operations[array_rand($operations)];
        $question  = $num . $operation . $num2;
        $answer    = (string)calculateOperation($operation, $num, $num2);

        $questions[] = [
            'question' => $question,
            'correctAnswer' => $answer
        ];
    }

    runGame($questionsText, $questions);
}

function calculateOperation($operation, $num, $num2): int
{
    switch ($operation) {
        case '+':
            return $num + $num2;
            break;
        case '-':
            return $num - $num2;
            break;
        case '*':
            return $num * $num2;
            break;
        default:
            throw new \Exception('Unknown operation!');
    }
}
