<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_OF_ROUNDS = 3;

function runGame(string $description, array $questions): void
{
    $playerName = greeting();
    line($description);

    foreach ($questions as $round) {
        line("Question: %s", $round['question']);
        $playerAnswer = prompt("Your answer");

        if ($round['correctAnswer'] === $playerAnswer) {
            line("Correct!");
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$round['correctAnswer']}'.");
            line("Let's try again, %s!", $playerName);
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
