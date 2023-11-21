<?php

function calculateAverage(array $valueList)
{
    $average = array_sum($valueList) / count($valueList);
    return round($average, 1, PHP_ROUND_HALF_ODD);
}
