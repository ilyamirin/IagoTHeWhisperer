<?php

namespace App\Adapter\Open;

class OwnBusinessAdapter extends OpenAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Свой бизнес';
    }
}
