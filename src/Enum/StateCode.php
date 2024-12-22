<?php

namespace App\Enum;

class StateCode
{
    public const
        NY = 'NY',
        OH = 'OH',
        CA = 'CA',
        NV = 'NV',
        CO = 'CO',
        KS = 'KS',
        KY = 'KY';

    public const CODES_WITH_NAMES = [
        self::NY => 'New York',
        self::OH => 'Ohio',
        self::CA => 'California',
        self::NV => 'Nevada',
        self::CO => 'Colorado',
        self::KS => 'Kansas',
        self::KY => 'Kentucky',
    ];
}
