<?php

namespace App\Enums;

enum FuelType: string
{
    case PETROL = 'petrol';
    case DIESEL = 'diesel';
    case GAS = 'gas';


    public static function getTypesToArray()
    {
        return [
            self::PETROL->value,
            self::DIESEL->value,
            self::GAS->value
        ];
    }
}
