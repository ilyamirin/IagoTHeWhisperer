<?php

namespace App\Adapter\AlfaBank;

use App\Model\ErrandInfo;
use App\Model\Range;

class VEDAdapter extends AlfaBankAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'ВЭД +';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(15, 25);
    }
}
