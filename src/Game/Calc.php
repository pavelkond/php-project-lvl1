<?php

namespace Brain\Games\Game\Calc;

use function Brain\Games\Engine\playGame;

function doOperation(int $num1, int $num2, string $operation): int
{
    $answer = 0;
    switch ($operation) {
        case "+":
            $answer =  $num1 + $num2;
            break;
        case "*":
            $answer = $num1 * $num2;
            break;
        case "-":
            $answer =  $num1 - $num2;
            break;
    }

    return $answer;
}

function generateTasks(): array
{
    $tasks = [];
    $operations = ["+", "*", "-"];
    for ($round = 0, $maxRounds = 3; $round < $maxRounds; $round++) {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $operationIndex = array_rand($operations);
        $answer = doOperation($num1, $num2, $operations[$operationIndex]);
        $question = "{$num1} {$operations[$operationIndex]} {$num2}";
        $tasks[] = [$question, $answer];
    }

    return $tasks;
}

function playCalcGame()
{
    $tasks = generateTasks();
    $rules = "What is the result of the expression?";
    playGame($rules, $tasks);
}
