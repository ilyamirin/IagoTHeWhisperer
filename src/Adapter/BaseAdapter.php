<?php

namespace App\Adapter;

use App\Entity\TransferRange;
use App\Object\ErrandInfo;
use App\Object\Range;
use App\Object\RangeInterface;

abstract class BaseAdapter
{
    public abstract function calculateReception(int $reception): float;

    /**
     * Check ranges as [min, max)
     * @param int $extradition
     * @return float
     */
    public function calculateExtradition(int $extradition): float
    {
        return $this->calculateRange($this->getExtraditionPercents(), $extradition);
    }

    public function calculateErrands(int $errands): float
    {
        $errandInfo = $this->getErrandInfo();

        if ($errands <= $errandInfo->getFreeErrands()) {
            return 0;
        }

        return ($errands - $errandInfo->getFreeErrands()) * $errandInfo->getCostErrand();
    }

    /**
     * @param TransferRange[] $transfers
     * @param int $profileTransfers
     * @return float
     */
    public function calculateTransfers($transfers, int $profileTransfers): float
    {
        return $this->calculateRange($transfers, $profileTransfers);
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

    public static abstract function getDefaultIndexName(): string;

    /** @return Range[] */
    protected abstract function getExtraditionPercents(): array;

    /** @return ErrandInfo  */
    protected abstract function getErrandInfo(): ErrandInfo;
}
