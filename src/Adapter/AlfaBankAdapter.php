<?php

namespace App\Adapter;

class AlfaBankAdapter extends BaseAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'AlfaBankAdapter';
    }
}
