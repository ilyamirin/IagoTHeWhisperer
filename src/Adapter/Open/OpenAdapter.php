<?php

namespace App\Adapter\Open;

use App\Adapter\BaseAdapter;
use App\Model\Range;

abstract class OpenAdapter extends BaseAdapter
{
    const RECEPTION_PERCENT = 0.0015;

    public function calculateReception(int $reception): float
    {
        return $reception * self::RECEPTION_PERCENT;
    }
}
