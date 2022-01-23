<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\playGame;

function gcd($x, $y)
{
    return $y === 0 ? $x : gcd($y, $x % $y);
}

function playGcdGame()
{
    $tasks = [];
    for ($i = 0; $i < 3; $i++) {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $question = "{$num1} {$num2}";
        $answer = gcd($num1, $num2);
        $tasks[] = [$question, $answer];
    }
    $rules = 'Find the greatest common divisor of given numbers.';
    playGame($rules, $tasks);
}
