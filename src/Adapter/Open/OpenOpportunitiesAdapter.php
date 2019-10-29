<?php

namespace App\Adapter\Open;

class OpenOpportunitiesAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Открытые возможности';
    }
}
