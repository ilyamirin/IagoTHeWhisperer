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

    public function __construct(?float $min, ?float $max, $value)
    {
        $this->min = $min;
        $this->max = $max;
        $this->value = $value;
    }

    public function getMin(): ?float
    {
        return $this->min;
    }

    public function getMax(): ?float
    {
        return $this->max;
    }

    public function getValue()
    {
        return $this->value;
    }
}
