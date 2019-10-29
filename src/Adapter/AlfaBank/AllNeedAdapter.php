<?php

namespace App\Adapter\AlfaBank;

use App\Object\Range;

class AllNeedAdapter extends AlfaBankAdapter
{
    public function calculateReception(int $reception): float
    {
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

        ];
    }
}
