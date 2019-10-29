<?php

namespace App\Object;

use App\Entity\Tariff;

class TariffResult
{
    /** @var Tariff */
    private $tariff;

    /** @var float */
    private $reception;

    public function __construct(Tariff $tariff, float $reception)
    {
        $this->tariff = $tariff;
        $this->reception = $reception;
    }

    public function getTariff(): Tariff
    {
        return $this->tariff;
    }

    public function getReception(): float
    {
        return $this->reception;
    }
}
