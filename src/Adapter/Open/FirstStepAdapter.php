<?php

namespace App\Adapter\Open;

use App\Object\ErrandInfo;

class FirstStepAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Первый шаг';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(3, 100);
    }
}
