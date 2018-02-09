<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    /**
     * Create a bot.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    public function app(\Illuminate\Http\Request $request)
    {
        $event = $request->json()->all();
        if ($event["type"] === "ADDED_TO_SPACE" && $event['space']['type'] == 'ROOM') {
            return ["text" => "Thanks for adding me!"];
        } elseif ($event["type"] === "MESSAGE") {
            $response = new PlanPokerController();
            return $response->start($event);
        } elseif ($event["type"] == "CARD_CLICKED") {
            return ["text"=>"Clicked"];
        }
    }
    public function test(\Illuminate\Http\Request $request)
    {
        $event = $request->json()->all();
        $button1 = new \App\Http\Classes\TextButton(1);
        $parameters[] = new \App\Http\Classes\Parameter("topic", $event['message']['text']);
        $parameters[] = new \App\Http\Classes\Parameter("value", 1);
        $action = new \App\Http\Classes\Action("vote");
        $action->setParameters($parameters);
        $button1->setOnClick($action);
        $buttons = [$button1];
        $widget = new \App\Http\Classes\Widget($buttons);
        return [$widget];
    }
}
