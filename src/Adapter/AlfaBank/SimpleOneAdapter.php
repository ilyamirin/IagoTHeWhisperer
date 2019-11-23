<?php

namespace App\Adapter\AlfaBank;

use App\Model\ErrandInfo;
use App\Model\Range;

class SimpleOneAdapter extends AlfaBankAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Просто 1%';
    }
}
