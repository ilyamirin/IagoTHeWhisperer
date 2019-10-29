<?php

namespace App\Adapter\AlfaBank;

use App\Object\Range;

class GoodChoiceAdapter extends AlfaBankAdapter
{
    public function calculateReception(int $reception): float
    {
        return 0;
    }

    public static function getDefaultIndexName(): string
    {
        return 'Удачный выбор';
    }

    /** @return Range[] */
    protected function getExtraditionPercents(): array
    {
        return [

        ];
    }
}
