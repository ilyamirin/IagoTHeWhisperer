<?php

namespace App\Adapter\AlfaBank;

use App\Object\ErrandInfo;
use App\Object\Range;

class GoodChoiceAdapter extends AlfaBankAdapter
{
    const RECEPTION_PERCENT = 0.003;

    public function calculateReception(int $reception): float
    {
        return $reception * self::RECEPTION_PERCENT;
    }

    public static function getDefaultIndexName(): string
    {
        return 'Удачный выбор';
    }

    /** @return Range[] */
    protected function getExtraditionPercents(): array
    {
        return [
            new Range(0, 200000, 0.01),
            new Range(200000, 500000, 0.015),
            new Range(500000, 1500000, 0.025),
            new Range(1500000, 3000000, 0.04),
            new Range(3000000, null, 0.1),
        ];
    }

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(10, 25);
    }
}
