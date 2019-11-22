<?php

namespace App\Model;

interface RangeInterface
{
    public function getMin(): ?float;

    public function getMax(): ?float;

    public function getValue(): ?float;
}
