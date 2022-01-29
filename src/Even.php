<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\playGame;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function generateTasks(): array
{
    $tasks = [];
    for ($round = 0, $maxRounds = 3; $round < $maxRounds; $round++) {
        $questionNum = rand(1, 20);
        $answer = isEven($questionNum) ? "yes" : "no";
        $tasks[] = [$questionNum, $answer];
    }

    return $tasks;
}

function playEvenGame()
{
    $tasks = generateTasks();
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';
    playGame($rules, $tasks);
}
