<?php

namespace App\Repositories;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\Twitte;

class TwitteRepository
{
    private $twitte;
    private $connection;
    private $access_token;
    private $access_token_secret;

    public function __construct()
    {
        define('CONSUMER_KEY', 'RixYJp7XK4TFn6WH4H4PBTtiP');
        define('CONSUMER_SECRET', 'Qirwz35AC4HQK7dnKmDugtPHv6r6SPkLhFh1N4l7AVCssP3Q7O');

        $this->access_token = '354094945-Y9b8opOcHumygRlKWEc7laZtUABtZPh5n1VS4lo4';
        $this->access_token_secret = 'mK3pEqKfTyRjdH0wV9VeKKdei5zUkGjogrVBPrWctkNf4';

        $this->connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $this->access_token, $this->access_token_secret);
        
    }

    public function index()
    {
        $tweets = $this->connection->get('statuses/user_timeline', ['user_id' => '50393960', 'count' => 50]);
        
        foreach($tweets as $tweet)
        {
            $this->twitte = new Twitte();
            $this->twitte->id = $tweet->id;
            $this->twitte->created = $tweet->created_at;
            $this->twitte->id_str = $tweet->id_str;
            $this->twitte->text = $tweet->text;
            $this->twitte->truncated = $tweet->truncated;
            $this->twitte->source = $tweet->source;
            $this->twitte->in_reply_to_status_id = $tweet->in_reply_to_status_id;
            $this->twitte->in_reply_to_status_id_str = $tweet->in_reply_to_status_id_str;
            $this->twitte->in_reply_to_user_id = $tweet->in_reply_to_user_id;
            $this->twitte->in_reply_to_user_id_str = $tweet->in_reply_to_user_id_str;
            $this->twitte->in_reply_to_screen_name = $tweet->in_reply_to_screen_name;
            $this->twitte->geo = $tweet->geo;
            $this->twitte->coordinates = $tweet->coordinates;
            $this->twitte->place = $tweet->place;
            $this->twitte->contributors = $tweet->contributors;
            $this->twitte->is_quote_status = $tweet->is_quote_status;
            $this->twitte->retweet_count = $tweet->retweet_count;
            $this->twitte->favorite_count = $tweet->favorite_count;
            $this->twitte->favorited = $tweet->favorited;
            $this->twitte->retweeted = $tweet->retweeted;
            $this->twitte->possibly_sensitive = $tweet->possibly_sensitive;
            $this->twitte->lang = $tweet->lang;
            $this->twitte->save();
        }
    }
}