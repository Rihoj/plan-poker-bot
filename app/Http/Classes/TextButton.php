<?php

namespace App\Http\Classes;

class TextButton implements \JsonSerializable
{
    public $text;
    
    public $onClick;
    
    public function __construct($text)
    {
        $this->text = $text;
    }
    
    public function getText()
    {
        return $this->text;
    }

    public function getOnClick()
    {
        return $this->onClick;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setOnClick($onClick)
    {
        $this->onClick = $onClick;
    }
    
    public function jsonSerialize()
    {
        return [
            'textButton' => ["text" => $this->getText(), "onClick"=> $this->getOnClick()]
        ];
    }
}
