<?php

namespace App\Adapter\AlfaBank;

use App\Object\ErrandInfo;
use App\Object\Range;

class VEDAdapter extends AlfaBankAdapter
{
    const RECEPTION_PERCENT = 0.003;

    public function calculateReception(int $reception): float
    {
        return $reception * self::RECEPTION_PERCENT;
    }

    public static function getDefaultIndexName(): string
    {
        return 'ВЭД +';
    }

    /** @return Range[] */
    protected function getExtraditionPercents(): array
    {
        return [
            new Range(0, 300000, 0.0075),
            new Range(300000, 800000, 0.015),
            new Range(800000, 2000000, 0.025),
            new Range(2000000, 4000000, 0.04),
            new Range(4000000, null, 0.1),
        ];
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(15, 25);
    }
}
