<?php

namespace App\Adapter\Open;

class FirstStepAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Первый шаг';
    }
}
