<?php

namespace App\Adapter\AlfaBank;

use App\Object\ErrandInfo;
use App\Object\Range;

class SimpleOneAdapter extends AlfaBankAdapter
{
    const RECEPTION_PERCENT = 0.01;

    public function calculateReception(int $reception): float
    {
        return $reception * self::RECEPTION_PERCENT;
    }

    public static function getDefaultIndexName(): string
    {
        return 'Просто 1%';
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(1, 0);
    }
}
