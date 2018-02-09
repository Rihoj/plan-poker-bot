<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return getenv("APP_ENV");
});

$router->post('/', function (\Illuminate\Http\Request $request) use ($router) {
    $event = $request->json()->all();
    if ($event["type"] === "ADDED_TO_SPACE" && $event['space']['type'] == 'ROOM') {
        return ["text" => "Thanks for adding me!"];
    } elseif ($event["type"] === "MESSAGE") {
//        $header = ["header"=>[
//          "title" => "Plan Poker",
//          "subtitle" => $event['message']['text']
//        ]];
//        $button1 = [
//            "textButton"=>[
//                "text"=>"1",
//                "onClick"=>[
//                    "action"=>[
//                        "actionMethodName"=>"vote",
//                        "parameters"=>[
//                            ["key"=> "topic", "value"=>$event['message']['text']],
//                            ["key"=> "value", "value"=>"1"]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//        $button2 = [
//            "textButton"=>[
//                "text"=>"2",
//                "onClick"=>[
//                    "action"=>[
//                        "actionMethodName"=>"vote",
//                        "parameters"=>[
//                            ["key"=> "topic", "value"=>$event['message']['text']],
//                            ["key"=> "value", "value"=>"2"]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//        $button3 = [
//            "textButton"=>[
//                "text"=>"3",
//                "onClick"=>[
//                    "action"=>[
//                        "actionMethodName"=>"vote",
//                        "parameters"=>[
//                            ["key"=> "topic", "value"=>$event['message']['text']],
//                            ["key"=> "value", "value"=>"3"]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//        $button4 = [
//            "textButton"=>[
//                "text"=>"5",
//                "onClick"=>[
//                    "action"=>[
//                        "actionMethodName"=>"vote",
//                        "parameters"=>[
//                            ["key"=> "topic", "value"=>$event['message']['text']],
//                            ["key"=> "value", "value"=>"5"]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//        $button5 = [
//            "textButton"=>[
//                "text"=>"8",
//                "onClick"=>[
//                    "action"=>[
//                        "actionMethodName"=>"vote",
//                        "parameters"=>[
//                            ["key"=> "topic", "value"=>$event['message']['text']],
//                            ["key"=> "value", "value"=>"8"]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//        $button6 = [
//            "textButton"=>[
//                "text"=>"13",
//                "onClick"=>[
//                    "action"=>[
//                        "actionMethodName"=>"vote",
//                        "parameters"=>[
//                            ["key"=> "topic", "value"=>$event['message']['text']],
//                            ["key"=> "value", "value"=>"13"]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//        $buttons = ["buttons"=>[$button1, $button2, $button3, $button4, $button5, $button6]];
//        $widgets = ["widgets"=>[$buttons]];
//        $section = ["sections"=>[$widgets]];
//        $cards = ["cards"=>[$header, $section]];
        $planPoker = new App\Http\Controllers\PlanPokerController();
        return $planPoker->start($event);
    } elseif ($event["type"] == "CARD_CLICKED") {
        return ["text"=>"Clicked"];
    }
});
