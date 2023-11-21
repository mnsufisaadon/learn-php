<?php

class Validator {
    //this is pure function, so can use static --- no $this exist
    public static function string($value, $min = 1, $max = INF)
    {
        return strlen($value) >= $min && strlen($value) <= $max;
    }
}