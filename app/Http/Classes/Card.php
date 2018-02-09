<?php

namespace App\Http\Classes;

class Card
{
    public $sections = [];
    
    public function getSections()
    {
        return $this->sections;
    }

    public function setSection($section)
    {
        $this->sections[] = $section;
    }
}
