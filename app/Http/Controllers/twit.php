<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use TwitterAPIExchange;
use App\tweet;
use Thujohn\Twitter\Twitter;
use Thujohn\Twitter\Twitter;
use Thujohn\Twitter\Facades\Twitter;

class twitter extends Controller
{
    public function index()
    {
        $tweet_model = new tweet;
        Twitter::getMiddleware();

        $response = json_decode(Twitter::getUserTimeline(['screen_name' => 'kamaalrkhan', 'count' => 20, 'format' => 'json']));
        foreach($response as $data)
        {
            $tweet_model::create(['text'=>$data['text'], 'posted_on'=>$data['created_at'],['user']=>$data['screen_name']]);

            echo "done <br>";
        }
    }
}
