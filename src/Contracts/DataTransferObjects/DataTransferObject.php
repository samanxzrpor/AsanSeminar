<?php

abstract class DataTransferObject
{

    public function __construct(...$args)
    {
        foreach ($args as $key => $value) {
            $this->setValue($key, $value);
        }
    }

    public function setValue($key , $value): void
    {
        $this->$key = $value;
    }

    public function getProperties()
    {

    }
}
