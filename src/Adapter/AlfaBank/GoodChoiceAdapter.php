<?php

namespace App\Adapter\AlfaBank;

use App\Model\ErrandInfo;
use App\Model\Range;

class GoodChoiceAdapter extends AlfaBankAdapter
{
    public static function getDefaultIndexName(): string
    {
        return 'Удачный выбор';
    }
}
