<?php

namespace App\Model;

class ErrandInfo
{
    /** @var int */
    private $freeErrands;

    /** @var float */
    private $costErrand;

    /**
     * @param int $freeErrands
     * @param float $costErrand
     */
    public function __construct(int $freeErrands, float $costErrand)
    {
        $this->freeErrands = $freeErrands;
        $this->costErrand = $costErrand;
    }

    /**
     * @return int
     */
    public function getFreeErrands(): int
    {
        return $this->freeErrands;
    }

    /**
     * @return float
     */
    public function getCostErrand(): float
    {
        return $this->costErrand;
    }
}
