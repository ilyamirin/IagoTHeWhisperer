<?php

namespace App\Adapter;

abstract class BaseAdapter
{
    public static abstract function getDefaultIndexName(): string;
}
