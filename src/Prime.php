<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\playGame;

function isPrime(int $number): bool
{
    if ($number <= 2) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function generateTasks(): array
{
    $tasks = [];
    for ($i = 0; $i < 3; $i++) {
        $questionNum = rand(1, 30);
        $answer = isPrime($questionNum) ? "yes" : "no";
        $tasks[] = [$questionNum, $answer];
    }

    return $tasks;
}

function playPrimeGame()
{
    $tasks = generateTasks();
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    playGame($rules, $tasks);
}
