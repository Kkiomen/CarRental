<?php

namespace App\Enums;

enum GearboxType: string
{
    case MANUAL = 'manual';
    case AUTOMAT = 'automat';
    case SEMI_AUTOMAT = 'semi-automat';


    public static function getTypesToArray()
    {
        return [
            self::MANUAL->value,
            self::AUTOMAT->value,
            self::SEMI_AUTOMAT->value
        ];
    }
}

