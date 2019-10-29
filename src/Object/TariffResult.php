<?php

namespace App\Object;

use App\Entity\Tariff;

class TariffResult
{
    /** @var Tariff */
    private $tariff;

    /** @var float */
    private $reception;

    /** @var float */
    private $extradition;

    public function __construct(Tariff $tariff, float $reception, float $extradition)
    {
        $this->tariff = $tariff;
        $this->reception = $reception;
        $this->extradition = $extradition;
    }

    public function getTariff(): Tariff
    {
        return $this->tariff;
    }

    public function getReception(): float
    {
        return $this->reception;
    }

    public function getExtradition(): float
    {
        return $this->extradition;
    }
}
