<?php

namespace App\Http\Classes;

class Card implements \JsonSerializable
{
    private $sections = [];
    
    public function getSections()
    {
        return $this->sections;
    }

    public function setSection($section)
    {
        $this->sections[] = $section;
    }
    
    public function jsonSerialize()
    {
        return ["sections"=> $this->getSections()];
    }
}
