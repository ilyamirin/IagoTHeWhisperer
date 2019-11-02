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

    /** @var float */
    private $errands;

    /**
     * @param Tariff $tariff
     * @param float $reception
     * @param float $extradition
     * @param float $errands
     */
    public function __construct(Tariff $tariff, float $reception, float $extradition, float $errands)
    {
        $this->tariff = $tariff;
        $this->reception = $reception;
        $this->extradition = $extradition;
        $this->errands = $errands;
    }

    /**
     * @return Tariff
     */
    public function getTariff(): Tariff
    {
        return $this->tariff;
    }

    /**
     * @return float
     */
    public function getReception(): float
    {
        return $this->reception;
    }

    /**
     * @return float
     */
    public function getExtradition(): float
    {
        return $this->extradition;
    }

    /**
     * @return float
     */
    public function getErrands(): float
    {
        return $this->errands;
    }
}
