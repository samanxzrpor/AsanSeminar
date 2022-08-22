<?php

namespace Core\Traits;

use Morilog\Jalali\Jalalian;

trait JalaliDate
{

    public static function changeToJalali(string $timestamp)
    {
        return  Jalalian::fromFormat('Y-m-d H:i:s', $timestamp);
    }

    public static function changeToCarbon(string $dateTime)
    {
        return  Jalalian::fromFormat('Y-m-d H:i:s', $dateTime)
            ->toCarbon()
            ->toDateTimeString();
    }
}
