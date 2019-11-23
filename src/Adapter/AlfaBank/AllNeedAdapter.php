<?php

namespace App\Adapter\AlfaBank;

use App\Model\ErrandInfo;
use App\Model\Range;

class AllNeedAdapter extends AlfaBankAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Все, что надо';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(1, 0);
    }
}
