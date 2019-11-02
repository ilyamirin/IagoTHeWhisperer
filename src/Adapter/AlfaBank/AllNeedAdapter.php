<?php

namespace App\Adapter\AlfaBank;

use App\Object\ErrandInfo;
use App\Object\Range;

class AllNeedAdapter extends AlfaBankAdapter
{
    public function calculateReception(int $reception): float
    {
        // Бесплатно
        return 0;
    }

    public static function getDefaultIndexName(): string
    {
        return 'Все, что надо';
    }

    /** @return Range[] */
    protected function getExtraditionPercents(): array
    {
        return [
            new Range(0, 500000, 0.025),
            new Range(500000, 1500000, 0.025),
            new Range(1500000, 2000000, 0.04),
            new Range(2000000, 3000000, 0.04),
            new Range(3000000, 5000000, 0.08),
            new Range(5000000, null, 0.1),
        ];
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(1, 0);
    }
}
