<?php

namespace App\Adapter\AlfaBank;

use App\Object\Range;

class VEDAdapter extends AlfaBankAdapter
{
    public function calculateReception(int $reception): float
    {
        return 0;
    }

    public static function getDefaultIndexName(): string
    {
        return 'ВЭД +';
    }

    /** @return Range[] */
    protected function getExtraditionPercents(): array
    {
        return [

        ];
    }
}
