<?php

namespace App\Http\Classes;

class Widget
{
    public $buttons = [];
    
    public function __construct($buttons)
    {
        $this->buttons = $buttons;
    }
}
