<?php

namespace App\Adapter\Open;

use App\Model\ErrandInfo;

class WholeWorldAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Весь мир';
    }
}
