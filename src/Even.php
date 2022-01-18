<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function getName()
{
    line("Welcome to the Brain Game!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function evenGame()
{
    $playerName = getName();
    $winsCount = 0;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    while ($winsCount !== 3) {
        $number = rand(1, 20);
        $answer = $number % 2 === 0 ? "yes" : "no";
        line("Question: %s", $number);
        $playerAnswer = prompt("Your answer");
        if ($playerAnswer === $answer) {
            $winsCount++;
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $playerAnswer, $answer);
            return;
        }
    }
    line("Congratulations, %s!", $playerName);
}
