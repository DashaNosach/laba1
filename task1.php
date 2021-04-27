<?php

function reverseString($str) {
   
    $result = "";
    for ($i = mb_strlen($str, "UTF-8"); $i >= 0; $i--){
        $result .= mb_substr($str, $i, 1, "UTF-8");
    }
    //s
    return $result;
}
