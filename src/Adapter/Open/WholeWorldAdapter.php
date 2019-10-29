<?php

namespace App\Adapter\Open;

class WholeWorldAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Весь мир';
    }
}
