<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function getName(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function playGame(string $gameRules, array $tasks)
{
    $playerName = getName();
    line($gameRules);
    foreach ($tasks as [$question, $answer]) {
        line("Question: %s", $question);
        $playerAnswer = prompt("Your answer");
        if ($playerAnswer === (string) $answer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $playerAnswer, $answer);
            return;
        }
    }
    line("Congratulations, %s!", $playerName);
}
