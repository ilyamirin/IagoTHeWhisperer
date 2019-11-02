<?php

namespace App\Adapter\AlfaBank;

use App\Object\ErrandInfo;
use App\Object\Range;

class OnStartAdapter extends AlfaBankAdapter
{
    public function calculateReception(int $reception): float
    {
        // Бесплатно
        return 0;
    }

    public static function getDefaultIndexName(): string
    {
        return 'На старт';
    }

    /** @return Range[] */
    protected function getExtraditionPercents(): array
    {
        return [
            new Range(129, 100000, 0.0125),
            new Range(100000, 250000, 0.0175),
            new Range(250000, 750000, 0.04),
            new Range(750000, 1500000, 0.06),
            new Range(1500000, null, 0.1),
        ];
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(3, 50);
    }
}
