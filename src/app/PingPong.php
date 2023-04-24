<?php

namespace App;

const PLAYER_A = 'jogador a';
const PLAYER_B = 'jogador b';
const ALTERNATE_SERVES_NORMAL = 5;
const ALTERNATE_SERVES_TIED = 2;
const TIED_MATCH = 20;

function saque($scoreboard)
{
    $scoreboardSplit = explode(":", $scoreboard);
    $scorePlayerA = intval($scoreboardSplit[0]);
    $scorePlayerB = intval($scoreboardSplit[1]);
    if(isMatchTied($scorePlayerA, $scorePlayerB))
        return checkTiedMatch($scorePlayerA, $scorePlayerB);
    return checkNormalMatch($scorePlayerA, $scorePlayerB);
}

function isMatchTied($scorePlayerA, $scorePlayerB) 
{
    $scoreDifference = abs(abs($scorePlayerA - $scorePlayerB) - 1);
    if(
        ($scorePlayerA >= TIED_MATCH && $scorePlayerB >= TIED_MATCH) &&
        (($scoreDifference == 0) || ($scoreDifference == 1))
    )
        return true;
    return false;
}

function checkNormalMatch($scorePlayerA, $scorePlayerB)
{
    $quotient = intdiv($scorePlayerA + $scorePlayerB, ALTERNATE_SERVES_NORMAL);
    $remainder = $quotient % 2;
    if($remainder == 0) return PLAYER_A;
    return PLAYER_B;
}


function checkTiedMatch($scorePlayerA, $scorePlayerB)
{
    $quotient = intdiv($scorePlayerA + $scorePlayerB, ALTERNATE_SERVES_TIED);
    $remainder = $quotient % 2;
    if($remainder == 0) return PLAYER_A;
    return PLAYER_B;
}
