<?php

namespace App\Adapter\AlfaBank;

use App\Model\ErrandInfo;
use App\Model\Range;

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

    /** @return ErrandInfo */
    protected function getErrandInfo(): ErrandInfo
    {
        return new ErrandInfo(15, 25);
    }
}
