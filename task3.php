<?php

function rewriteJsonFile(string $pathToJsonFile, string $key, $value): void
{
    $jsonStr = file_get_contents($pathToJsonFile);
    $jsonArray = json_decode($jsonStr, TRUE);
    $jsonArray[$key] = $value;
    file_put_contents($pathToJsonFile, json_encode($jsonArray));
}
