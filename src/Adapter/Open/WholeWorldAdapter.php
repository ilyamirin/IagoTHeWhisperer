<?php

namespace App\Adapter\Open;

use App\Model\ErrandInfo;

class WholeWorldAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Весь мир';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(15, 25);
    }
}
