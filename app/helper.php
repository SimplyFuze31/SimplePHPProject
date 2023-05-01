<?php

function formatDollarSign(float $amount){

    return ($amount < 0 ? '-' : '') . '$' . number_format(abs($amount),2);
}