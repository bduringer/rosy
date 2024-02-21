<?php

namespace app\helpers;

class Macros
{
    public function lower(string $value)
    {
        return strtolower($value);
    }
    public function upper(string $value)
    {
        return strtoupper($value);
    }
}
