<?php

namespace App\Http\Classes;

class Action
{
    public $actionMethodName;
    
    public $parameters = [];

    public function __construct($actionMethodName)
    {
        $this->actionMethodName = $actionMethodName;
    }

    public function getActionMethodName()
    {
        return $this->actionMethodName;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function setActionMethodName($actionMethodName)
    {
        $this->actionMethodName = $actionMethodName;
    }

    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function addParemeter(Parameter $parameter)
    {
        $this->parameters[] = $parameter;
    }
}
