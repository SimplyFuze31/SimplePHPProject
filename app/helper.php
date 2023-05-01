<?php

function formatDollarSign(float $amount){

    $isNegative = $amount < 0;

    return ($isNegative ? '-' : '') . '$' . number_format(abs($amount),2);
}