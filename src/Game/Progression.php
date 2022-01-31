<?php

namespace Brain\Games\Game\Progression;

use function Brain\Games\Engine\playGame;

function generateProgression(int $start, int $step, int $len): array
{
    $progression = [];
    for ($i = $start; count($progression) < $len; $i += $step) {
        $progression[] = $i;
    }

    return $progression;
}

function generateTasks(): array
{
    $tasks = [];
    for ($round = 0, $maxRounds = 3; $round < $maxRounds; $round++) {
        $start = rand(1, 20);
        $step = rand(1, 5);
        $len = rand(7, 10);
        $progression = generateProgression($start, $step, $len);
        $answerIndex = array_rand($progression);
        $answer = $progression[$answerIndex];
        $progression[$answerIndex] = '..';
        $question = implode(" ", $progression);
        $tasks[] = [$question, $answer];
    }

    return $tasks;
}

function playProgressionGame()
{
    $tasks = generateTasks();
    $rules = "What number is missing in the progression?";
    playGame($rules, $tasks);
}
