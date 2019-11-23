<?php

namespace App\Adapter\AlfaBank;

use App\Model\ErrandInfo;
use App\Model\Range;

class OnStartAdapter extends AlfaBankAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'На старт';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(3, 50);
    }
}
