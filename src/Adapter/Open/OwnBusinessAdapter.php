<?php

namespace App\Adapter\Open;

use App\Model\ErrandInfo;

class OwnBusinessAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Свой бизнес';
    }
}
