<?php

namespace App\Adapter\AlfaBank;

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

    /** @return Range[] */
    protected function getExtraditionPercents(): array
    {
        return [
            new Range(0, 1500000, 0),
            new Range(1500000, null, 0.1),
        ];
    }
}