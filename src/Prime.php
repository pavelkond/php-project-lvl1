<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\playGame;

function isPrime(int $number): bool
{
    if ($number < 2) {
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
    for ($round = 0, $maxRounds = 3; $round < $maxRounds; $round++) {
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
