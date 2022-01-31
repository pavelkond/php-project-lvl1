<?php

namespace Brain\Games\Game\Gcd;

use function Brain\Games\Engine\playGame;

function gcd(int $x, int $y): int
{
    return $y === 0 ? $x : gcd($y, $x % $y);
}

function generateTasks(): array
{
    $tasks = [];
    for ($round = 0, $maxRounds = 3; $round < $maxRounds; $round++) {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $question = "{$num1} {$num2}";
        $answer = gcd($num1, $num2);
        $tasks[] = [$question, $answer];
    }

    return $tasks;
}

function playGcdGame()
{
    $tasks = generateTasks();
    $rules = 'Find the greatest common divisor of given numbers.';
    playGame($rules, $tasks);
}
