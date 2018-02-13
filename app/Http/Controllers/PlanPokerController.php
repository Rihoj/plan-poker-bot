<?php

namespace App\Http\Controllers;

use App\Http\Classes\Action;
use App\Http\Classes\Card;
use App\Http\Classes\Header;
use App\Http\Classes\Parameter;
use App\Http\Classes\Response;
use App\Http\Classes\Section;
use App\Http\Classes\TextButton;
use App\Http\Classes\Widget;

class PlanPokerController
{
    public $response;
    
    public function start($event)
    {
        $this->response = new Response;
        $card = new Card();
        $section = new Section();
        $card->setSection($section);
        $buttons = $this->createButtons($event['message']['text']);
        $section->widgets[] = new Widget($buttons);
        $this->response->cards[] = new Header("Plan Poker", $event['message']['text'], getenv("APP_IMAGE"), getenv("APP_IMAGE_STYLE"));
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
        $action->addParemeter($parameterId);
        $action->addParemeter($parameterValue);
        $button = new TextButton($value);
        $button->onClick = $action;
        return $button;
    }
    
    public function vote($event)
    {
//        error_log(print_r($event, 1));
        $voters = [];
        $user = $event['user']['displayName'];
        $parameters = $event['action']['parameters'];
        $votersHeader = isset($event['message']['cards'][2]['header']) ? $event['message']['cards'][2]['header'] : null;
        if ($votersHeader !== null) {
            $voters = explode(", ", $votersHeader['subtitle']);
        }
        $actionResponse = new \stdClass;
        $actionResponse->type = "UPDATE_MESSAGE";
        $this->response = new Response;
        $card = new Card();
        $section = new Section();
        $card->setSection($section);
        $parameter = [];
        foreach ($parameters as $value) {
            $parameter[$value['key']] = $value['value'];
        }
        $buttons = $this->createButtons($parameter['id']);
        $section->widgets[] = new Widget($buttons);
        $this->response->cards[] = new Header("Plan Poker", $parameter['id']);
        $this->response->cards[] = $card;
        if (!in_array($user, $voters)) {
            $voters[] = $user;
        }
        $this->response->cards[] = new Header("Voters", implode(", ", $voters));
        
        return ["actionResponse"=>$actionResponse, "cards"=> $this->response->cards];
    }
}
