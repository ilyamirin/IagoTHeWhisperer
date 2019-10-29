<?php

namespace App\Adapter;

abstract class BaseAdapter
{
    public abstract function calculateReception(int $reception): float;

    public static abstract function getDefaultIndexName(): string;
}
