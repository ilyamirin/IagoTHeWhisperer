<?php

namespace App\Adapter\Open;

use App\Adapter\BaseAdapter;
use App\Object\Range;

abstract class OpenAdapter extends BaseAdapter
{
    const RECEPTION_PERCENT = 0.0015;

    public function calculateReception(int $reception): float
    {
        return $reception * self::RECEPTION_PERCENT;
    }

    /** @inheritDoc */
    protected function getExtraditionPercents(): array
    {
        return [
            new Range(199, 100000, 0.0099),
            new Range(100000, 500000, 0.0199),
            new Range(500000, 1000000, 0.0299),
            new Range(1000000, null, 0.0499),
        ];
    }
}
