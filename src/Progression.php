<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\playGame;

function generateProgression(int $start, int $step, int $len): array
{
    $progression = [];
    for ($i = $start; count($progression) < $len; $i += $step) {
        $progression[] = $i;
    }

    return $progression;
}

function playProgressionGame()
{
    $tasks = [];
    for ($i = 0; $i < 3; $i++) {
        $start = rand(1, 20);
        $step = rand(1, 5);
        $len = rand(7, 10);
        $progression = generateProgression($start, $step, $len);
        $answerIndex = rand(0, count($progression) - 1);
        $answer = $progression[$answerIndex];
        $progression[$answerIndex] = '..';
        $question = implode(" ", $progression);
        $tasks[] = [$question, $answer];
    }
    $rules = "What number is missing in the progression?";
    playGame($rules, $tasks);
}
