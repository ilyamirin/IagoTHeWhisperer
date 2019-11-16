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

    /** @var float */
    private $transfers;

    /** @var float */
    private $check;

    /**
     * @param Tariff $tariff
     * @param float $reception
     * @param float $extradition
     * @param float $errands
     * @param float $transfers
     * @param float $check
     */
    public function __construct(
        Tariff $tariff,
        float $reception,
        float $extradition,
        float $errands,
        float $transfers,
        float $check
    ) {
        $this->tariff = $tariff;
        $this->reception = $reception;
        $this->extradition = $extradition;
        $this->errands = $errands;
        $this->transfers = $transfers;
        $this->check = $check;
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

    public function getTransfers(): float
    {
        return $this->transfers;
    }

    public function getCheck(): float
    {
        return $this->check;
    }

    public function getCost(): float
    {
        return $this->reception + $this->extradition + $this->errands + $this->transfers + $this->check;
    }
}
