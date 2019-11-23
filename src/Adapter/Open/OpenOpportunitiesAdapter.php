<?php

namespace App\Adapter\Open;

use App\Model\ErrandInfo;

class OpenOpportunitiesAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Открытые возможности';
    }
}
