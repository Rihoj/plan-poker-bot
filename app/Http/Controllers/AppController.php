<?php

namespace App\Http\Controllers;

use App\Http\Classes\Action;
use App\Http\Classes\Parameter;
use App\Http\Classes\TextButton;
use App\Http\Classes\Widget;
use Illuminate\Http\Request;

class AppController extends Controller
{
    private $planPokerController;
    /**
     * Create a bot.
     *
     * @return void
     */
    public function __construct(PlanPokerController $planPokerController)
    {
        $this->planPokerController = $planPokerController;
    }
    
    public function app(Request $request)
    {
        $event = $request->json()->all();
        if ($event["type"] === "ADDED_TO_SPACE" && $event['space']['type'] == 'ROOM') {
            return ["text" => "Thanks for adding me!"];
        } elseif ($event["type"] === "MESSAGE") {
            return $this->planPokerController->start($event);
        } elseif ($event["type"] == "CARD_CLICKED") {
            return $this->planPokerController->vote($event);
        }
    }
    public function test(Request $request)
    {
        $event = $request->json()->all();
        $button1 = new TextButton(1);
        $parameters[] = new Parameter("topic", $event['message']['text']);
        $parameters[] = new Parameter("value", 1);
        $action = new Action("vote");
        $action->setParameters($parameters);
        $button1->setOnClick($action);
        $buttons = [$button1];
        $widget = new Widget($buttons);
        return [$widget];
    }
}
