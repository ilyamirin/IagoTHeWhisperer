<?php

namespace App\Adapter\Open;

use App\Model\ErrandInfo;

class FirstStepAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Первый шаг';
    }
}
