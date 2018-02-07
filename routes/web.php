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
    return $router->app->version();
});

$router->post('/', function (\Illuminate\Http\Request $request) use ($router) {
    $event = $request->json()->all();
    if ($event["type"] === "ADDED_TO_SPACE" && $event['space']['type'] == 'ROOM') {
        return ["text" => "Thanks for adding me!"];
    } elseif ($event["type"] === "MESSAGE") {
        $header = ["header"=>[
          "title" => "Plan Poker",
          "subtitle" => $event['message']['text']
        ]];
        $button1 = ["textButton"=>["text"=>"1", "onClick"=>["openLink"=>["url"=>"http://google.com"]]]];
        $buttons = ["buttons"=>[$button1]];
        $widgets = ["widgets"=>[$buttons]];
        $section = ["sections"=>[$widgets]];
        $cards = ["cards"=>[$header, $section]];
        return $cards;
    }
});
