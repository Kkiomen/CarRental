<?php

namespace App\Enums;

enum ReservationType: string
{
    case RESERVED = 'reserved';
    case IN_USE_BY_CUSTOMER = 'inCustomer';
    case ENDED = 'ended';
    case CANCEL = 'cancel';

    public function getStatus(){
        return match($this){
            self::RESERVED => 0,
            self::IN_USE_BY_CUSTOMER => 1,
            self::ENDED => 2,
            self::CANCEL => 3
        };
    }

    public static function getTypesToArray()
    {
        return [
            self::RESERVED->value,
            self::IN_USE_BY_CUSTOMER->value,
            self::ENDED->value,
            self::CANCEL->value
        ];
    }
}
