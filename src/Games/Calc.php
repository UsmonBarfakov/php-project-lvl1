<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\COUNT_OF_ROUNDS;

function run(): void
{
    $operations  = ['+', '-', '*'];
    $description = 'What is the result of the expression?';
    $questions   = [];

    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $number    = rand(1, 10);
        $number2   = rand(1, 10);
        $operation = $operations[array_rand($operations)];
        $question  = "{$number} {$operation} {$number2}";
        $answer    = (string)getResult($operation, $number, $number2);

        $questions[] = [
            'question'      => $question,
            'correctAnswer' => $answer
        ];
    }

    runGame($description, $questions);
}

function getResult($operation, $number, $number2): int
{
    switch ($operation) {
        case '+':
            return $number + $number2;
            break;
        case '-':
            return $number - $number2;
            break;
        case '*':
            return $number * $number2;
            break;
        default:
            throw new \Exception('Unknown operation!');
    }
}
