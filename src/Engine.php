<?php
namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_OF_ROUNDS = 3;

function runGame($questionText, array $questions)
{
    $playerName = greeting();
    foreach ($questions as $round)
    {
        line("{$questionText}\n");
        line("Question: {$round['question']}\n");
        $answer = prompt("Your answer:");
        if ($round['correctAnswer'] === $answer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$round['correctAnswer']}'.\nLet's try again, {$playerName}");
            return;
        }
    }
    line("Congratulations, {$playerName}!");
}

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}