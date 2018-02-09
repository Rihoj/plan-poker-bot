<?php

namespace App\Http\Controllers;

use App\Http\Classes\Action;
use App\Http\Classes\Card;
use App\Http\Classes\Parameter;
use App\Http\Classes\Response;
use App\Http\Classes\Section;
use App\Http\Classes\Sender;
use App\Http\Classes\TextButton;
use App\Http\Classes\Widget;
use Illuminate\Http\Request;

class PlanPokerController
{
    public $response;
    
    public function start(Request $request)
    {
        $event = $request->json()->all();
        $this->response = new Response;
//        $this->response->sender = new Sender();
        $card = new Card();
        $section = new Section();
        $card->setSection($section);
        $buttons = $this->createButtons($event['message']['text']);
        $section->widgets[] = new Widget($buttons);
        $this->response->cards[] = $card;
        return (array) $this->response;
    }
    
    private function createButtons($identifier)
    {
        $buttons = [];
        $buttons[] = $this->createButton(1, $identifier);
        $buttons[] = $this->createButton(2, $identifier);
        $buttons[] = $this->createButton(3, $identifier);
        $buttons[] = $this->createButton(5, $identifier);
        $buttons[] = $this->createButton(8, $identifier);
        $buttons[] = $this->createButton(13, $identifier);
        
        return $buttons;
    }
    
    private function createButton($value, $id)
    {
        $action = new Action("vote");
        $parameterValue = new Parameter("value", $value);
        $parameterId = new Parameter("id", $id);
        $action->addParemeter($parameterValue);
        $action->addParemeter($parameterId);
        $button = new TextButton($value);
        $button->onClick = $action;
        return $button;
    }
}
