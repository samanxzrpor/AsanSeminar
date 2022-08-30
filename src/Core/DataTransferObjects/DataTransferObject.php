<?php
namespace Core\DataTransferObjects;

use ReflectionClass;

abstract class DataTransferObject
{


    public static function fromRequest($request)
    {
        $returendData = [];
        $reflection= new ReflectionClass(static::class);
        $properties = $reflection->getProperties();
        foreach ($properties as $key => $value) {
            if (is_array($request))
                $returendData[$value->name] = $request[$value->name];
            if (is_object($request))
                $returendData[$value->name] = $request->{$value->name};
        }

        return $returendData;
    }
}
