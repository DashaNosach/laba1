<?php

function createArray(array $array, int $deep, int $x): array {
    $deep--;
    for ($i = 0; $i < $x; $i++) {
        if ($deep > 0) {
            $array[] = [];
            $array[$i] = createArray($array[$i], $deep, $x);
        }
        else {
            $array[] = random_int(10, 10000);
        }
    }
    return $array;
}

function createDeepArrayOfNumbers(int $deep): array {
    
    $x = random_int(6, 9);
    $array = [];
    $array = createArray($array, $deep, $x);
    return $array;
}

function sumArray(array $array): int {
    $sum = 0;
    foreach ($array as $i) {
        if (is_integer($i)) {
            $sum += $i;
        }
        else {
            $sum += sumArray($i);
        }
    }
    return $sum;
}

function calculateSum(array $deepArrayOfNumbers): int {
    return sumArray($deepArrayOfNumbers);
}
