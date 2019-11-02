<?php

namespace App\Object;

class Range
{
    /** @var float|null */
    private $min;

    /** @var float|null */
    private $max;

    /** @var mixed */
    private $value;

    /**
     * @param float|null $min
     * @param float|null $max
     * @param $value
     */
    public function __construct(?float $min, ?float $max, $value)
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
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
