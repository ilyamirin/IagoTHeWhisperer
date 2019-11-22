<?php

namespace App\Adapter\Open;

use App\Model\ErrandInfo;

class OwnBusinessAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Свой бизнес';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(15, 25);
    }
}
