<?php

use App\Stack;

function compareStrings(string $str1, string $str2): bool
{
        $process = function ($str) {
            $stack = new Stack();

            for ($i = 0; $i < strlen($str); $i++) {
                if ($str[$i] === '#') {
                    $stack->pop();
                } else {
                    $stack->push($str[$i]);
                }
            }

            return $stack->__toString();
        };

        return $process($str1) === $process($str2);
}
