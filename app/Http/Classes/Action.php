<?php

namespace App\Http\Classes;

class Action implements \JsonSerializable
{
    private $actionMethodName;
    
    private $parameters = [];

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
    public function jsonSerialize()
    {
        return [
            "action"=>[
                "actionMethodName"=> $this->actionMethodName,
                "parameters"=> $this->parameters
            ]
        ];
    }
}
