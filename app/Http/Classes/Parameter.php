<?php

namespace App\Http\Classes;

class Parameter
{
    public $key;
    
    public $value;
    
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}
