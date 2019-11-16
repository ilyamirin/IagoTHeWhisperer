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

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(10, 25);
    }
}
