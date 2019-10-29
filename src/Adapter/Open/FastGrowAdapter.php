<?php

namespace App\Adapter\Open;

class FastGrowAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Быстрый рост';
    }
}
