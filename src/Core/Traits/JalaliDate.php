<?php

namespace Core\Traits;

use Morilog\Jalali\Jalalian;

trait JalaliDate
{

    public static function changeToJalali(string $timestamp)
    {
        return  Jalalian::forge($timestamp)->format(' %d %B %Y');
    }

    public static function changeToCarbon(string $dateTime)
    {
        return Jalalian::fromDateTime($dateTime / 1000)
            ->toCarbon()
            ->toDateTimeString();
    }
}
