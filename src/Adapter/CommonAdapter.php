<?php

namespace App\Adapter;

class CommonAdapter extends AbstractBaseAdapter
{
    /**
     * @inheritDoc
     */
    public static function getDefaultIndexName(): string
    {
        return 'Общий адаптер';
    }
}