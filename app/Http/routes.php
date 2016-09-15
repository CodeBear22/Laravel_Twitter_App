<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/',function()
{

    $tweet_model = new App\tweet;
    $tweets = $tweet_model::latest('posted_on')->published()->get();

    return view('tweet/index',compact('tweets'));
});


Route::get('/check',function()
{
    $flag = 0;
    $tweet_model = new App\tweet;
    $response = json_decode(Twitter::getUserTimeline(['screen_name' => 'kamaalrkhan', 'count' => 20, 'format' => 'json']));

    foreach ($response as $data) {
        if ($tweet_model::where('posted_on', new \Carbon\Carbon($data->created_at))->get()->toArray() == NULL) {
            $tweet_model::create(['text' => $data->text, 'posted_on' => new \Carbon\Carbon($data->created_at), 'user' => "@kamaalrkhan"]);
            $flag = 1;

        }
    }
    return $flag;


});
