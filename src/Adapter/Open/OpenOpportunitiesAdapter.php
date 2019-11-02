<?php

namespace App\Adapter\Open;

use App\Object\ErrandInfo;

class OpenOpportunitiesAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Открытые возможности';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(1, 0);
    }
}
