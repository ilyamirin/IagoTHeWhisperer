<?php

namespace App\Adapter\Open;

use App\Object\ErrandInfo;

class FastGrowAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Быстрый рост';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(7, 50);
    }
}
