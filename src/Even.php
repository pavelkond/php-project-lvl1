<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\playGame;

function playEvenGame()
{
    $tasks = [];
    for ($i = 0; $i < 3; $i++) {
        $questionNum = rand(1, 20);
        $answer = $questionNum % 2 === 0 ? "yes" : "no";
        $tasks[] = [$questionNum, $answer];
    }
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';
    playGame($rules, $tasks);
}
