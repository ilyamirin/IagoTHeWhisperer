<?php

namespace App\Adapter;

use App\Entity\CheckRange;
use App\Entity\ExtraditionRange;
use App\Entity\ReceptionRange;
use App\Entity\Tariff;
use App\Entity\TransferRange;
use App\Model\Profile;
use App\Model\RangeInterface;
use App\Model\TariffResult;

abstract class AbstractBaseAdapter
{
    /**
     * @param Tariff $tariff
     * @param Profile $profile
     * @return TariffResult
     */
    public function calculate(Tariff $tariff, Profile $profile): TariffResult
    {
        return new TariffResult(
            $tariff,
            $this->calculateReception($tariff->getReceptionRanges(), $profile->getReception()),
            $this->calculateExtradition($tariff->getExtraditionRanges(), $profile->getExtradition()),
            $this->calculateErrands($tariff->getFreeErrandsAmount(), $tariff->getErrandCost(), $profile->getErrands()),
            $this->calculateTransfers($tariff->getTransferRanges(), $profile->getTransfers()),
            $this->calculateCheck($tariff->getCheckRanges(), $profile->getCheck())
        );
    }

    /**
     * @return string
     */
    public static abstract function getDefaultIndexName(): string;

    /**
     * @param ReceptionRange[] $receptions
     * @param int $reception
     * @return float
     */
    protected function calculateReception($receptions, int $reception): float
    {
        return $this->calculateRange($receptions, $reception);
    }

    /**
     * Check ranges as [min, max)
     * @param ExtraditionRange[] $extraditions
     * @param int $extradition
     * @return float
     */
    protected function calculateExtradition($extraditions, int $extradition): float
    {
        return $this->calculateRange($extraditions, $extradition);
    }

    /**
     * @param int $freeErrandsAmount
     * @param float $errandCost
     * @param int $errands
     * @return float
     */
    protected function calculateErrands(int $freeErrandsAmount, float $errandCost, int $errands): float
    {
        if ($errands <= $freeErrandsAmount) {
            return 0;
        }

        return ($errands - $freeErrandsAmount) * $errandCost;
    }

    /**
     * @param TransferRange[] $transfers
     * @param int $profileTransfers
     * @return float
     */
    protected function calculateTransfers($transfers, int $profileTransfers): float
    {
        return $this->calculateRange($transfers, $profileTransfers);
    }

    /**
     * @param CheckRange[] $checks
     * @param float $profileCheck
     * @return float
     */
    protected function calculateCheck($checks, float $profileCheck): float
    {
        return $this->calculateRange($checks, $profileCheck);
    }

    /**
     * @param RangeInterface[] $ranges
     * @param float $value
     * @return float
     */
    protected function calculateRange($ranges, float $value): float
    {
        foreach ($ranges as $range) {
             if (
                (null === $range->getMin() and $value < $range->getMax()) or
                (null === $range->getMax() and $value >= $range->getMin()) or
                ($range->getMin() <= $value and $value < $range->getMax())
            ) {
                return $value * (float) $range->getValue();
            }
        }

        return 0;
    }
}
