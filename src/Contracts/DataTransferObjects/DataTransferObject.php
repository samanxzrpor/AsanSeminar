<?php


abstract class DataTransferObject
{

    public static function fromRequest($request)
    {
        $properties = new ReflectionClass(self::class);

        dd($properties);
    }
}
