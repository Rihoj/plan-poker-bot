<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Classes;

/**
 * Description of Header
 *
 * @author james
 */
class Header implements \JsonSerializable
{
    const SQUARE = "IMAGE";
    const CIRCLE = "AVATAR";

    private $title;
    private $subtitle;
    private $imageUrl;
    private $imageStyle;
    
    public function __construct($title, $subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }
    
    public function jsonSerialize()
    {
        return [
            'header' => ["title" => $this->title, "subtitle"=> $this->subtitle]
        ];
    }
}
