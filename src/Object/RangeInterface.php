<?php

namespace App\Object;

interface RangeInterface
{
    public function getMin(): ?float;

    public function getMax(): ?float;

    public function getValue(): ?float;
}
