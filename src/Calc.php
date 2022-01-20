<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\playGame;

function playCalcGame()
{
    $tasks = [];
    $operations = ["+", "*", "-"];
    for ($i = 0; $i < 3; $i++) {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $operIndex = array_rand($operations);
        switch ($operations[$operIndex]) {
            case "+":
                $answer = $num1 + $num2;
                break;
            case "*":
                $answer = $num1 * $num2;
                break;
            case "-":
                $answer = $num1 - $num2;
                break;
        }
        $question = "{$num1} {$operations[$operIndex]} {$num2}";
        $tasks[] = [$question, $answer];
    }
    $rules = "What is the result of the expression?";
    playGame($rules, $tasks);
}
