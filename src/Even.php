<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function run(): void
{
    $countCorrect = 3; // Count of correct answers must be 3
    $userName = greeting();
    startGame($userName, $countCorrect);
}

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function startGame($userName, $countCorrect): void
{
    showMsg('Answer "yes" if the number is even, otherwise answer "no".');
    for ($usersCountCorrect = 0; $usersCountCorrect < $countCorrect; $usersCountCorrect++) {
        $number = getNumber();
        showMsg("Question: {$number}");
        $answer = getAnswer("Your answer");

        if ($answer === checkAnswer($number)) {
            showMsg("Correct!");
        } else {
            showMsg("'yes' is wrong answer ;(. Correct answer was 'no'. Let's try again, {$userName}}");
            return;
        }
    }
    showMsg("Congratulations, {$userName}!");
}

function showMsg($text): void
{
    line($text);
}

function getAnswer($text): string
{
    return prompt($text);
}

function getNumber(): int
{
    return rand(1, 100);
}

function checkAnswer($number): string
{
    $result = $number % 2;
    if ($result > 0) {
        return 'no';
    } else {
        return 'yes';
    }
}
