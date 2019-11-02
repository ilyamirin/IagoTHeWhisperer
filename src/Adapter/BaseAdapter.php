<?php

namespace App\Adapter;

use App\Object\ErrandInfo;
use App\Object\Range;

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
        $extraditionPercents = $this->getExtraditionPercents();

        foreach ($extraditionPercents as $range) {
            if (
                (null === $range->getMin() and $extradition < $range->getMax()) or
                (null === $range->getMax() and $extradition >= $range->getMin()) or
                ($range->getMin() <= $extradition and $extradition < $range->getMax())
            ) {
                return $extradition * $range->getValue();
            }
        }

        return 0;
    }

    public function calculateErrands(int $errands): float
    {
        $errandInfo = $this->getErrandInfo();

        if ($errands <= $errandInfo->getFreeErrands()) {
            return 0;
        }

        return ($errands - $errandInfo->getFreeErrands()) * $errandInfo->getCostErrand();
    }

    public static abstract function getDefaultIndexName(): string;

    /** @return Range[] */
    protected abstract function getExtraditionPercents(): array;

    /** @return ErrandInfo  */
    protected abstract function getErrandInfo(): ErrandInfo;
}
