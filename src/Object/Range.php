<?php

namespace App\Object;

class Range implements RangeInterface
{
    /** @var float|null */
    private $min;

    /** @var float|null */
    private $max;

    /** @var float */
    private $value;

    /**
     * @param float|null $min
     * @param float|null $max
     * @param float $value
     */
    public function __construct(?float $min, ?float $max, float $value)
    {
        $this->min = $min;
        $this->max = $max;
        $this->value = $value;
    }

    /**
     * @return float|null
     */
    public function getMin(): ?float
    {
        return $this->min;
    }

    /**
     * @return float|null
     */
    public function getMax(): ?float
    {
        return $this->max;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
