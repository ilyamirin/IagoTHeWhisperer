<?php

namespace App\Adapter\AlfaBank;

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
}
